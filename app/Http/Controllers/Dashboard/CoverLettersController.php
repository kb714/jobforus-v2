<?php

namespace JobForUs\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\CoverLettersPostRequest;
use JobForUs\Model\CoverLetters;
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

    public function store(CoverLettersPostRequest $data)
    {
        Auth::user()->coverLetters()->create($data->all());

        return Redirect::to(route('cartas.index'))
            ->with('alert-success', 'Carta creada con éxito, espere su aprobación.');
    }

    public function show($id)
    {
        $data = Auth::user()->coverLetters->find($id);
        if($data)
            return $data;
        abort(404);

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        $data = Auth::user()->coverLetters->find($id);
        if($data){
            $data->delete();
            return Redirect::to(route('cartas.index'))
                ->with('alert-success', 'Carta eliminada con éxito');
        }
        abort(404);
    }
}
