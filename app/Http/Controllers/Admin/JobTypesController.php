<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\JobTypePutRequest;
use JobForUs\Model\JobType;

class JobTypesController extends Controller
{
    private $path = 'admin.job_types.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $this->data = [
            'job_types' => JobType::get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function update(JobTypePutRequest $request, $id)
    {
        $data = JobType::find($id);

        if($data->update($request->all()))
            return redirect(route('job-types.index'))->with('alert-success', 'Actualizado');
        return redirect(route('job-types.index'))->with('alert-warning', 'Hubo un error');
    }
}
