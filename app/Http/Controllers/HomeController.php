<?php

namespace JobForUs\Http\Controllers;

use Illuminate\Http\Request;
use JobForUs\Model\CoverLetters;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->data = [
            'slider' => true
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = [
            'cover_letters' => CoverLetters::where('status', true)->get()
        ];

        return view(__FUNCTION__, $this->data);
    }
}
