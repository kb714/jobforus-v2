<?php

namespace JobForUs\Http\Controllers\Dashboard\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Account\PersonalInformationPostRequest;
use JobForUs\Model\JobType;
use JobForUs\Model\Location;
use JobForUs\Model\Region;

class PersonalInformationController extends Controller
{
    private $path = 'dashboard.account.personal_information.';

    public function index()
    {
        $this->data = [
            'jobs_types'    => JobType::where('status', 1)->orderBy('weight')->get(),
            'locations'     => Location::where('status', 1)->orderBy('weight')->get(),
            'regions'       => Region::where('status', 1)->orderBy('weight')->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(PersonalInformationPostRequest $request)
    {
        Auth::user()->profile->update($request->all());

        return Redirect::route('personal-information.index')
            ->with('alert-info', 'Información actualizada con éxito');
    }
}
