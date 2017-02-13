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

        $status = $request->get('status') ?? 0;

        echo $status;

        $data->where('status', $status);


        if ($request->has('order')) {
            $data = PayStatus::where('order', 'like', '%' . $request->order . '%');
        }

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

        if($request->status == 0){
            if( $data->user->profile->user_type == 4 ){
                //change status
                $data->user->membership->update([
                    'notify_status' => 0,
                    'plan_id' => 1,
                    'ends_at' => null,
                    'beginning_at' => null
                ]);
            } else {
                $data->user->membership->update([
                    'notify_status' => 0,
                    'plan_id' => 2,
                    'ends_at' => null,
                    'beginning_at' => null
                ]);
            }
        }

        if($request->status == 4){
            //update membership
            $data->user->membership->update([
                'plan_id' => $data->plan_id,
                'beginning_at' => Carbon::now(),
                'ends_at' => Carbon::now()->addDays($data->plan->quantity),
                'notify_status' => $data->plan->quantity > 10 ? 1 : 2
            ]);
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
