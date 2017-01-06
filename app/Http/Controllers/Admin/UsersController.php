<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\User;

class UsersController extends Controller
{
    private $path = 'admin.users.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $this->data = [
            'data' => User::get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function show($id)
    {
        $this->data = [
            'data' => User::find($id)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function edit($id)
    {
        return User::find($id);
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {
        return redirect(route('users.index'))
            ->with('alert-success', 'Usuario eliminado con éxito');
    }
}
