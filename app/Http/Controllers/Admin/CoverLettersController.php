<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\CoverLetterPutRequest;
use JobForUs\Mail\NotificationMail;
use JobForUs\Model\CoverLetters;

class CoverLettersController extends Controller
{
    private $path = 'admin.cover_letters.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $data = CoverLetters::orderBy('created_at', 'DESC')->orderBy('status');

        if($request->has('user_id')){
            $data->where('user_id', $request->get('user_id'));
        }

        $this->data = [
            'data' => $data->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function show($id)
    {
        $this->data = [
            'data' => CoverLetters::find($id)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function edit($id)
    {
        $data = CoverLetters::find($id);
        $this->data = [
            'data' => $data,
            'other' => CoverLetters::where('user_id', $data->user_id)
                ->where('id', '<>', $id)
                ->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function update(CoverLetterPutRequest $request, $id)
    {
        $data = CoverLetters::find($id);
        $data->update($request->all());

        if($data->status == (int) FALSE) {
            //send emails
            $message = "Estimado usuario, su carta de presentación fue rechazada por el siguiente motivo: $data->reason";
            Mail::to($data->user->email)->send(new NotificationMail($message));
        } else {
            //send emails
            $message = "Estimado usuario, su carta de presentación '$data->name' fue aprobada";
            Mail::to($data->user->email)->send(new NotificationMail($message));
        }

        return redirect(route('cover-letters.index'))
            ->with('alert-success', 'Carta actualizada con éxito');
    }

    public function destroy($id)
    {
        $data = CoverLetters::find($id);
        $data->delete();

        return Redirect::back()
            ->with('alert-success', 'Carta eliminada con éxito');
    }
}
