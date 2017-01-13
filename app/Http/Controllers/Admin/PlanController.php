<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\PlanPostRequest;
use JobForUs\Model\Plan;

class PlanController extends Controller
{
    private $path = 'admin.plans.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $this->data = [
            'data' => Plan::orderBy('user_type_id')->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function create()
    {
        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(PlanPostRequest $request)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
