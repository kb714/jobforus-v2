<?php

namespace JobForUs\Http\Controllers\Auth;

use JobForUs\Model\Location;
use JobForUs\Model\Region;
use JobForUs\User;
use JobForUs\Model\JobType;
use Validator;
use JobForUs\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->redirectTo = route('dashboard.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'      => 'required|max:255|unique:users',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:6|max:255|confirmed',
            // user type: 4 Person, 6 Company
            'user_type'     => 'required|in:4,6',
            'name'          => 'required|min:3|max:255',
            'identifier'    => 'required|max:30',//rut
            // PERSON VALIDATION
            'last_name'     => 'required_if:user_type,4|min:3|max:255',
            'job_type_id'   => 'required_if:user_type,4|exists:job_types,id',
            'location_id'   => 'required_if:user_type,4|exists:locations,id',
            'region_id'     => 'required_if:location_id,1|exists:regions,id',
            // contact information
            'phone'         => 'required_if:user_type,6|min:3|max:255',
            'facebook'      => 'min:3|max:255',
            'twitter'       => 'min:3|max:255',
            'other'         => 'min:3|max:255',
            // COMPANY VALIDATION
            'commercial_business'       => 'required_if:user_type,6|min:3|max:255',
            'industry'                  => 'required_if:user_type,6|min:3|max:255',
            'address'                   => 'required_if:user_type,6|min:3|max:255',
            'company_contact_name'      => 'required_if:user_type,6|min:3|max:255',
            'company_contact_position'  => 'required_if:user_type,6|min:3|max:255',
            'company_contact_email'     => 'required_if:user_type,6|email|min:3|max:255',
            'company_contact_phone'     => 'required_if:user_type,6|min:3|max:255'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $this->data = [
            'jobs_types'    => JobType::where('status', 1)->orderBy('weight')->get(),
            'locations'     => Location::where('status', 1)->orderBy('weight')->get(),
            'regions'       => Region::where('status', 1)->orderBy('weight')->get()
        ];

        return view('auth.register', $this->data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data = User::build($data);

        return $data;
    }
}
