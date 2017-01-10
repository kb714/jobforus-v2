<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\ProfilePostRequest;

class ProfileController extends Controller
{
    private $path = 'admin.profile.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(ProfilePostRequest $request)
    {
        if (Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {

            if($request->has('password')){
                Auth::guard('admin')->user()->update(['password' => Hash::make($request->password)]);
            }

            if($request->has('email')){
                Auth::guard('admin')->user()->update(['email' => $request->email]);
            }

            return redirect(route('admin-profile.index'))
                ->with('alert-success', 'Perfil actualizado con éxito');
        }

        return redirect(route('admin-profile.index'))
            ->with('alert-danger', 'Contraseña actual no corresponde');
    }
}
