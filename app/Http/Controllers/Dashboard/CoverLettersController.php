<?php

namespace JobForUs\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Model\JobType;

class CoverLettersController extends Controller
{
    private $path = 'dashboard.cover_letters.';

    public function index()
    {
        //unused
    }

    public function create()
    {
        $this->data = [
            'jobs_types'    => JobType::where('status', 1)->orderBy('weight')->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }
}
