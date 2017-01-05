<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Model\JobType;
use JobForUs\User;

class AdminController extends Controller
{
    private $path = 'admin.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $this->data = [
            'person_count' => User::whereHas('profile', function($q){
                $q->where('user_type', 4);
            })->count(),
            'company_count' => User::whereHas('profile', function($q){
                $q->where('user_type', 6);
            })->count(),
            'job_type_count' => JobType::count()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }
}
