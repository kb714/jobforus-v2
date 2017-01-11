<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\PagesPutRequest;
use JobForUs\Model\Page;

class PagesController extends Controller
{
    private $path = 'admin.pages.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $this->data = [
            'data' => Page::all()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function edit($id)
    {
        $this->data = [
            'data' => Page::find($id)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function update(PagesPutRequest $request, $id)
    {
        $data = Page::find($id);
        $data->update($request->all());

        return redirect(route('pages.index'))->with('alert-success', 'Página actualizada con éxito');
    }
}
