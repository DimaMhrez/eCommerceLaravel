<?php

namespace App\Http\Controllers;

use App\Category;
use App\MainMenu;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index(){
        $menu=MainMenu::OrderBy('name','desc')->get();
        $cat=Category::OrderBy('sortOrder','asc')->get();

        $data=array(
            'main_menus'=>$menu,
            'categories'=>$cat,
        );

        return view('front_end.index')->with($data);

    }
}
