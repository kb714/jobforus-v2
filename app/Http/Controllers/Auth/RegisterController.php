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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['user_type'] == 4){
            // Person type validator
            return Validator::make($data, [
                'username'      => 'required|max:255|unique:users',
                'email'         => 'required|email|max:255|unique:users',
                'password'      => 'required|min:6|confirmed',
                'identifier'    => 'required',
                'job_type_id'   => 'required|exists:job_types,id'
            ]);
        }else{
            // Company type validator
            return Validator::make($data, [
                'username'      => 'required|max:255|unique:users',
                'email'         => 'required|email|max:255|unique:users',
                'password'      => 'required|min:6|confirmed',
                'identifier'    => 'required'
            ]);
        }
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
