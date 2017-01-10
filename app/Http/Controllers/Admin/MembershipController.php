<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;

class MembershipController extends Controller
{
    private $path = 'admin.membership.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view($this->path.__FUNCTION__, $this->data);
    }
}
