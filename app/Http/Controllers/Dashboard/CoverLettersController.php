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
}
