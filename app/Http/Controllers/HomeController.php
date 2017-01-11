<?php

namespace JobForUs\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use JobForUs\Http\Requests\ContactPostRequest;
use JobForUs\Mail\ContactAdmin;
use JobForUs\Mail\ContactClient;
use Illuminate\Http\Request;
use JobForUs\Model\CoverLetters;
use JobForUs\Model\Page;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = [
            'slider'        => true,
            'cover_letters' => CoverLetters::where('status', true)
                ->orderBy('created_at', 'DESC')
                ->get()
        ];

        return view(__FUNCTION__, $this->data);
    }

    public function search(Request $request)
    {
        $data = CoverLetters::where('name', 'like', '%' . $request->q . '%')
            ->orWhere('description', 'like', '%' . $request->q . '%')
            ->get();

        $this->data = [
            'slider' => true,
            'data' => $data
        ];

        return view(__FUNCTION__, $this->data);
    }

    public function show($id)
    {
        $data = CoverLetters::find($id);

        if(!$data || $data->status == (int) FALSE)
            abort(404);

        $this->data = [
            'data' => $data,
            'other' => $data->user->coverLetters()->where('id', '<>', $id)->get()
        ];

        return view('letters', $this->data);
    }

    public function page($slug)
    {
        $data = Page::where('slug', $slug)->first();

        if(!$data)
            return $this->show($slug);

        $this->data = [
            'data' => $data
        ];

        return view('pages', $this->data);
    }

    public function contact(ContactPostRequest $request)
    {
        Mail::to('info@jobforus.cl')->send(new ContactAdmin($request->all()));
        Mail::to($request->email)->send(new ContactClient());

        return redirect(route('home.page', 'contacto'))
            ->with('alert-success', 'Mensaje enviado con éxito, pronto nos pondremos en contacto con usted');
    }
}
