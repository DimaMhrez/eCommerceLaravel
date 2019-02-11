<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Product;


class FrontEndController extends Controller
{
    //
    public function index()
    {
        //Prepara i prodotti da mostrare.
        $ShowcaseItems=Product::where('showcase','1')->take(3)->get();
        $FeaturedItems=Product::where('featured','1')->take(15)->get();
        $SpecialItems=Product::where('special','1')->take(5)->get();
        $onSaleItems=Product::whereNotNull('sale_id');

        $data=array(
            'Showcase' => $ShowcaseItems,
            'Featured' => $FeaturedItems,
            'Special' => $SpecialItems,
            'Sale' => $onSaleItems,
        );


        return view('front_end.index')->with('data',$data);

    }


    public function about()
    {

        return view('front_end.contact');

    }

}