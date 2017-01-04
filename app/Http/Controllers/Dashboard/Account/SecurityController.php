<?php

namespace JobForUs\Http\Controllers\Dashboard\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Account\SecurityPostRequest;

class SecurityController extends Controller
{
    private $path = 'dashboard.account.security.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(SecurityPostRequest $request)
    {
        if (Hash::check($request->current_password, Auth::user()->password)) {

            if($request->has('password')){
                Auth::user()->update(['password' => Hash::make($request->password)]);
            }

            if($request->has('email')){
                Auth::user()->update(['email' => $request->email]);
            }

            return Redirect::route('security.index')
                ->with('alert-info', 'Cambios de seguridad realizados con éxito');
        }

        return Redirect::route('security.index')
            ->with('alert-danger', 'Error intentando validar su contraseña actual');
    }
}
