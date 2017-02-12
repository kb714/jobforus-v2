<?php

namespace JobForUs\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\UserPutRequest;
use JobForUs\Mail\NotificationMail;
use JobForUs\Model\JobType;
use JobForUs\Model\Location;
use JobForUs\Model\Plan;
use JobForUs\Model\Region;
use JobForUs\User;

class UsersController extends Controller
{
    private $path = 'admin.users.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $this->data = [
            'data' => User::orderBy('created_at', 'DESC')->paginate(25)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function show($id)
    {
        $this->data = [
            'data' => User::find($id)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $plans = Plan::where('user_type_id', $user->profile->user_type)
            ->where('price', '>', 0)
            ->get();

        $this->data = [
            'data' => $user,
            'plans' => $plans,
            'jobs_types'    => JobType::where('status', 1)->orderBy('weight')->get(),
            'locations'     => Location::where('status', 1)->orderBy('weight')->get(),
            'regions'       => Region::where('status', 1)->orderBy('weight')->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function update(UserPutRequest $request, $id)
    {
        $data = User::find($id);
        $data->update($request->all());

        if($data->profile->user_type == 4) {
            $profile = [
                'name' => $request->get('name'),
                'identifier' => $request->get('identifier'),
                'last_name' => $request->get('last_name'),
                'job_type_id' => $request->get('job_type_id'),
                'location_id' => $request->get('location_id'),
                'region_id' => $request->get('region_id'),
                'phone' => $request->get('phone'),
                'facebook' => $request->get('facebook'),
                'twitter' => $request->get('twitter'),
                'other' => $request->get('other'),
                'contact_preference_username' => $request->get('contact_preference_username', 0),
                'contact_preference_name' => $request->get('contact_preference_name', 0),
                'contact_preference_email' => $request->get('contact_preference_email', 0),
                'contact_preference_phone' => $request->get('contact_preference_phone', 0),
                'contact_preference_other' => $request->get('contact_preference_other', 0)
            ];
        }

        $data->profile->update($profile ?? $request->all());

        return redirect(route('users.edit', $id))
            ->with('alert-success', 'Usuario actualizado');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect(route('users.index'))
            ->with('alert-success', 'Usuario eliminado con éxito');
    }

    public function changePlan(Request $request)
    {
        $user = User::find($request->id);

        if($request->action == 'disable') {
            if( $user->profile->user_type == 4 ){
                //change status
                $user->membership->update([
                    'notify_status' => 0,
                    'plan_id' => 1,
                    'ends_at' => null,
                    'beginning_at' => null
                ]);
            } else {
                $user->membership->update([
                    'notify_status' => 0,
                    'plan_id' => 2,
                    'ends_at' => null,
                    'beginning_at' => null
                ]);
            }
        }

        if( $request->action == 'change' ) {
            //update membership
            $plan = Plan::find($request->plan_id);
            $user->membership->update([
                'plan_id' => $plan->id,
                'beginning_at' => Carbon::now(),
                'ends_at' => Carbon::now()->addDays($plan->quantity),
                'notify_status' => $plan->quantity > 10 ? 1 : 2
            ]);
            //send emails
            $message = 'La cuenta del usuario <b>'.$user->username. '</b> fue actualizada a plan <b>'.$plan->name.'</b>';
            Mail::to('info@jobforus.cl')->send(new NotificationMail($message));
            $message = 'Su cuenta: <b>'.$user->username. '</b> fue actualizada a plan <b>'.$plan->name.'<b>';
            Mail::to($user->email)->send(new NotificationMail($message));
        }

        return redirect()->back()->with('alert-success', 'Plan actualizado con éxito');
    }
}
