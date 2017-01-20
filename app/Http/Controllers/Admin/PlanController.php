<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\PlanPostRequest;
use JobForUs\Http\Requests\Admin\PlanPutRequest;
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
        Plan::create($request->all());
        return redirect(route('admin-plans.index'))->with('alert-success', 'Plan creado con éxito');
    }

    public function edit($id)
    {
        $this->data = [
            'data' => Plan::find($id)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function update(PlanPutRequest $request, $id)
    {
        $data = Plan::find($id);
        $data->update($request->all());

        return redirect(route('admin-plans.index'))->with('alert-success', 'Plan actualizado con éxito');
    }

    public function destroy($id)
    {

    }
}
