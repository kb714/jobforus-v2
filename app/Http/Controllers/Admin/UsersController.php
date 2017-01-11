<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\UserPutRequest;
use JobForUs\Model\JobType;
use JobForUs\Model\Location;
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
        $this->data = [
            'data' => User::find($id),
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
        $data->profile->update($request->all());

        return redirect(route('users.edit', $id))
            ->with('alert-success', 'Usuario actualizado');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect(route('users.index'))
            ->with('alert-success', 'Usuario eliminado con éxito');
    }
}
