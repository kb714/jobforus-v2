<?php

namespace JobForUs\Http\Controllers;

use JobForUs\Http\Requests\ContactPostRequest;
use JobForUs\Model\CoverLetters;
use JobForUs\Model\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->data = [
            'slider' => true
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = [
            'cover_letters' => CoverLetters::where('status', true)
                ->orderBy('created_at', 'DESC')
                ->get()
        ];

        return view(__FUNCTION__, $this->data);
    }

    public function show($id)
    {
        $data = CoverLetters::find($id);

        if(!$data || $data->status == (int) FALSE)
            abort(404);

        $this->data = [
            'data' => $data
        ];

        return view('letters', $this->data);
    }

    public function page($slug)
    {
        $data = Page::where('slug', $slug)->first();

        if(!$data)
            return $this->show($slug);

        $this->data = [
            'data' => $data
        ];

        return view('pages', $this->data);
    }

    public function contact(ContactPostRequest $request)
    {
        return redirect(route('home.page', 'contacto'))
            ->with('alert-success', 'Mensaje enviado con éxito, pronto nos pondremos en contacto con usted');
    }
}
