<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Model\JobType;

class JobTypesController extends Controller
{
    private $path = 'admin.job_types.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $this->data = [
            'job_types' => JobType::get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }
}
