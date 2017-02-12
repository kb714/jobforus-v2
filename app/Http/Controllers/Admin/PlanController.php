<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\PlanPostRequest;
use JobForUs\Http\Requests\Admin\PlanPutRequest;
use JobForUs\Model\Membership;
use JobForUs\Model\Plan;
use JobForUs\User;

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
        if($id < 3) {
            return Redirect::back()
                ->with('alert-success', 'No es posible eliminar los planes básicos, si desea hacer cambios contacte al desarrollador');
        }

        $plan = Plan::find($id);

        $memberships = Membership::where('plan_id', $plan->id)->get();

        // define plan id
        $plan_id = 2;

        if( $plan->user_type_id == 4 ){
            $plan_id = 1;

        }

        // finish memberships
        foreach($memberships as $membership){
            $membership->update([
                'notify_status' => 0,
                'plan_id' => $plan_id,
                'ends_at' => null,
                'beginning_at' => null
            ]);
        }

        $plan->delete();

        return Redirect::back()
            ->with('alert-success', 'Plan eliminado con éxito, cuentas asociadas se les asignó un plan básico');
    }
}
