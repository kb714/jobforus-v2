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
            'users' => User::get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }
}
