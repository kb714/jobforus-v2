<?php

namespace JobForUs\Http\Controllers\Dashboard;

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
    private $path = 'dashboard.personal_information.';

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        if(Auth::user()->profile->user_type == 4) {
            $data = [
                'name'                          => $request->get('name'),
                'identifier'                    => $request->get('identifier'),
                'last_name'                     => $request->get('last_name'),
                'job_type_id'                   => $request->get('job_type_id'),
                'location_id'                   => $request->get('location_id'),
                'region_id'                     => $request->get('region_id'),
                'phone'                         => $request->get('phone'),
                'facebook'                      => $request->get('facebook'),
                'twitter'                       => $request->get('twitter'),
                'other'                         => $request->get('other'),
                'employment_situation'          => $request->get('employment_situation'),
                'experience'                    => $request->get('experience'),
                'study_level'                   => $request->get('study_level'),
                'study_title'                   => $request->get('study_title'),
                'languages'                     => $request->get('languages'),
                'curricular_other'              => $request->get('curricular_other'),
                'contact_preference_username'   => $request->get('contact_preference_username', 0),
                'contact_preference_name'       => $request->get('contact_preference_name', 0),
                'contact_preference_email'      => $request->get('contact_preference_email', 0),
                'contact_preference_phone'      => $request->get('contact_preference_phone', 0),
                'contact_preference_other'      => $request->get('contact_preference_other', 0)
            ];
        }

        Auth::user()->profile->update($data ?? $request->all());

        return Redirect::route('personal-information.index')
            ->with('alert-info', 'Información actualizada con éxito');
    }
}
