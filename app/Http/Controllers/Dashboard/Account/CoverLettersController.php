<?php

namespace JobForUs\Http\Controllers\Dashboard\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Account\CoverLettersPostRequest;
use JobForUs\Model\JobType;

class CoverLettersController extends Controller
{
    private $path = 'dashboard.account.cover_letters.';

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
        Auth::user()->coverLetters()->create($request->all());

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
