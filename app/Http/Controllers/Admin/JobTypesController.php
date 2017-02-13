<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\JobTypePostRequest;
use JobForUs\Http\Requests\Admin\JobTypePutRequest;
use JobForUs\Model\CoverLetters;
use JobForUs\Model\JobType;
use JobForUs\Model\Plan;
use JobForUs\Model\Profile;

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

    public function create()
    {
        return view($this->path.__FUNCTION__, $this->data);
    }

    public function store(JobTypePostRequest $request)
    {
        if(JobType::create($request->all())){
            return redirect(route('job-types.index'))->with('alert-success', 'Tipo de trabajo creado con éxito');
        }
        return redirect()->back()->with('alert-warning', 'Hubo un problema al crear el tipo de trabajo, inténtelo de nuevo');
    }

    public function edit($id)
    {
        $this->data = [
            'data' => JobType::find($id)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function update(JobTypePutRequest $request, $id)
    {
        $data = JobType::find($id);

        if($data->update($request->all())){
            return redirect(route('job-types.index'))->with('alert-success', 'Actualizado');
        }

        return redirect(route('job-types.index'))->with('alert-warning', 'Hubo un error');
    }

    public function destroy($id)
    {
        if($id == 1){
            return redirect()->back()->with('alert-danger', 'No puede eliminar el tipo de trabajo base');
        }
        $job_type = JobType::find($id);
        //update cover letters
        CoverLetters::where('job_type_id', $job_type->id)->update([
            'job_type_id' => 1
        ]);

        Profile::where('job_type_id', $job_type->id)->update([
            'job_type_id' => 1
        ]);

        $job_type->delete();

        return redirect()->back()->with('alert-success', 'Tipo de trabajo eliminado con éxito');
    }
}
