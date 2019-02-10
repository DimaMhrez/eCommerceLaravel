<?php

namespace App\Http\Controllers;



class FrontEndController extends Controller
{
    //
    public function index()
    {
        return view('front_end.index');

    }


    public function about()
    {

        return view('front_end.contact');

    }

}