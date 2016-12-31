<?php

namespace JobForUs\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private $path = 'dashboard.';

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view($this->path.__FUNCTION__);
    }
}
