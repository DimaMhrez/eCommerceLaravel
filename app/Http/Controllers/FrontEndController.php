<?php

namespace App\Http\Controllers;

use App\Category;
use App\MainMenu;
use App\Brand;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        return view('front_end.index');

    }


    public function about()
    {
        $ourbrand = Brand::find(1);
        return view('front_end.contact')->with('ourbrand',$ourbrand);

    }

}