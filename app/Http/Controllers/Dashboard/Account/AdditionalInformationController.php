<?php

namespace JobForUs\Http\Controllers\Dashboard\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Account\AdditionalInformationPostRequest;

class AdditionalInformationController extends Controller
{
    private $path = 'dashboard.account.additional_information.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(AdditionalInformationPostRequest $request)
    {
        Auth::user()->profile->update($request->all());

        return Redirect::route('additional-information.index')
            ->with('alert-info', 'La información fue guardada con éxito');
    }
}
