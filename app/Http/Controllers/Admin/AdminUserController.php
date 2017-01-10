<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JobForUs\Admin;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\AdminUserPostRequest;

class AdminUserController extends Controller
{
    private $path = 'admin.admin_users.';

    public function index()
    {
        $this->data = [
            'data' => Admin::all()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function create()
    {
        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(AdminUserPostRequest $request)
    {
        Admin::build($request->all());

        return redirect(route('admin-users.index'))
            ->with('alert-success', 'Administrador creado con éxito');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy($id)
    {
        $data = Admin::find($id);

        if($data->id == Auth::guard('admin')->user()->id) {
            return redirect(route('admin-users.index'))
                ->with('alert-warning', 'No puede eliminar su propio usuario');
        }

        $data->delete();

        return redirect(route('admin-users.index'))
            ->with('alert-success', 'Administrador eliminado con éxito');
    }
}
