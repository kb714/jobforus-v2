<?php

namespace JobForUs\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Account\CoverLettersPostRequest;
use JobForUs\Mail\NotificationMail;
use JobForUs\Model\JobType;

class CoverLettersController extends Controller
{
    private $path = 'dashboard.cover_letters.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view($this->path.__FUNCTION__, $this->data);
    }

    public function create()
    {
        $this->data = [
            'jobs_types' => JobType::where('status', 1)->orderBy('weight')->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(CoverLettersPostRequest $request)
    {
        if(Auth::user()->membership->plan_id == 1 && Auth::user()->coverLetters()->count() > 2){
            return Redirect::to(route('letters.index'))
                ->with('alert-success', 'Alcanzó el límite de 3 cartas de presentación, subscribase a un plan premium para no tener límites de publicación.');
        }

        if(Auth::user()->membership->plan_id > 1 && Auth::user()->coverLetters()->count() > 9){
            return Redirect::to(route('letters.index'))
                ->with('alert-success', 'Alcanzó el límite de 10 cartas de presentación.');
        }

        Auth::user()->coverLetters()->create($request->all());

        //refactorizar
        $message = 'Una nueva carta de presentación espera su aprobación con el nombre de: '.$request->name;
        //./ refactorizar

        Mail::to('info@jobforus.cl')->send(new NotificationMail($message));

        return Redirect::to(route('letters.index'))
            ->with('alert-success', 'Carta creada con éxito, espere su aprobación.');
    }

    public function show($id)
    {
        $data = Auth::user()->coverLetters->find($id);
        if($data)
            return $data;
        abort(404);

    }

    public function destroy($id)
    {
        $data = Auth::user()->coverLetters->find($id);
        if($data){
            $data->delete();
            return Redirect::to(route('letters.index'))
                ->with('alert-success', 'Carta eliminada con éxito');
        }
        abort(404);
    }
}
