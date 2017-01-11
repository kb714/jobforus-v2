<?php

namespace JobForUs\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Mail\NotificationMail;
use JobForUs\Model\PayStatus;
use JobForUs\Model\Plan;
use JobForUs\User;

class MembershipController extends Controller
{
    private $path = 'admin.membership.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $data = PayStatus::orderBy('status');

        if($request->has('status'))
            $data->where('status', $request->status);
        else
            $data->where('status', 0);

        if($request->has('order'))
            $data = PayStatus::where('order', 'like', '%' . $request->order . '%');

        $this->data = [
            'data' => $data->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(Request $request)
    {
        $data = PayStatus::find($request->id);

        $data->update([
            'status' => $request->status
        ]);

        if($request->status == 4){
            //update membership (refactor need)
            $data->user->membership->plan_id = $data->plan_id;
            $data->user->membership->beginning_at = Carbon::now();
            $data->user->membership->ends_at = Carbon::now()->addDays($data->plan->quantity);
            $data->user->membership->save();
            //send emails
            $message = 'La cuenta del usuario <b>'.$data->user->username. '</b> fue actualizada a plan <b>'.$data->plan->name.'</b>';
            Mail::to('info@jobforus.cl')->send(new NotificationMail($message));
            $message = 'Su cuenta: <b>'.$data->user->username. '</b> fue actualizada a plan <b>'.$data->plan->name.'<b>';
            Mail::to($data->user->email)->send(new NotificationMail($message));
        }

        return Redirect::back()
            ->with('alert-success', 'Estado de pago actualizado, correos de notificación enviados si corresponde');
    }
}
