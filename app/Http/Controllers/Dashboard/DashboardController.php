<?php

namespace JobForUs\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Model\PayStatus;
use JobForUs\Model\Plan;

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
        $this->data = [
            'plan' => Plan::where('user_type_id', Auth::user()->profile->user_type)
                ->where('price', '>', 0)
                ->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function generateOrder(Request $request)
    {
        $data = PayStatus::create([
            'user_id'   => Auth::user()->id,
            'plan_id'   => $request->plan_id,
            'order'     => 'PJOB-'.time()
        ]);

        $this->data = [
            'data' => $data
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }
}
