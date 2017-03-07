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
                ->orderBy('quantity')
                ->orderBy('price')
                ->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function generateOrder(Request $request)
    {
        if(Auth::user()->payPlanPending()) {
            return redirect()->back()->with('alert-warning', 'Tiene un plan pendiente de pago');
        }

        $data = Auth::user()->payStatus()->create([
            'plan_id'   => $request->plan_id,
            'order'     => 'PJOB-'.time()
        ]);

        $this->data = [
            'data' => $data
        ];

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyOrder()
    {
        Auth::user()->payStatus()->where('status', 0)->update([
            'status' => 6
        ]);

        return redirect(route('dashboard.index'))
            ->with('alert-warning', 'Orden cancelada');
    }
}
