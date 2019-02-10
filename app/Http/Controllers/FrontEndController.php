<?php

namespace App\Http\Controllers;

use App\Category;
use App\MainMenu;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        if(!Auth::guest()){
            $user=Auth::user()->id;
        }
        else $user=0;


        $temp=DB::select('Select p.id,p.normalPrice,p.name from products p INNER JOIN carts c INNER JOIN product_variants pv ON c.product_variant_id=pv.id and pv.product_id=p.id and c.user_id='.$user);

        View::share('cartnumber', count($temp));
        View::share('cartitems', $temp);

        return view('front_end.index');

    }


    public function about()
    {
        if(!Auth::guest()){
            $user=Auth::user()->id;
        }
        else $user=0;
        $temp=DB::select('Select p.id,p.normalPrice,p.name from products p INNER JOIN carts c INNER JOIN product_variants pv ON c.product_variant_id=pv.id and pv.product_id=p.id and c.user_id='.$user);


        View::share('cartnumber', count($temp));
        View::share('cartitems',$temp);


        return view('front_end.contact');

    }

}