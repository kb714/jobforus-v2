<?php

namespace JobForUs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use JobForUs\Http\Controllers\Controller;
use JobForUs\Http\Requests\Admin\CoverLetterPutRequest;
use JobForUs\Model\CoverLetters;

class CoverLettersController extends Controller
{
    private $path = 'admin.cover_letters.';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $this->data = [
            'data' => CoverLetters::orderBy('status')->get()
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function show($id)
    {
        $this->data = [
            'data' => CoverLetters::find($id)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function edit($id)
    {
        $this->data = [
            'data' => CoverLetters::find($id)
        ];

        return view($this->path.__FUNCTION__, $this->data);
    }

    public function update(CoverLetterPutRequest $request, $id)
    {
        $data = CoverLetters::find($id);
        $data->update($request->all());

        return redirect(route('cover-letters.index'))
            ->with('alert-success', 'Carta actualizada con éxito');
    }

    public function destroy($id)
    {

    }
}
