<?php

namespace App\Http\Controllers;


use App\Brand;
use App\BulletDescription;
use App\Category;
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

    public function show($id){

        $product=Product::find($id);
        if(!empty($product)) {

            $brands = Brand::all()->take(5);


            $category = Category::select('categories.id','categories.name')
                ->join('category_has_product_variants','categories.id','=','category_has_product_variants.category_id')
                ->join('products','products.id','=','category_has_product_variants.product_id')
                ->where('products.id',$id)
                ->first();

            //Se possibile, sarebbe carino riscrivere queste query con Eloquent (ci ho provato ma sembra non funzionare)
            $bulletpoints=DB::select('select bd.id, bd.description from bullet_descriptions bd where product_id='.$id);

            $variants=DB::select('select * from product_variants where product_id='.$id);

            $details=DB::select('select * from bullet_details where product_id='.$id);

            $relatedProducts=DB::select('select p.* from products p INNER JOIN category_has_product_variants pv where p.id=pv.product_id AND pv.category_id='.$category->id);


            $productsdata= array(
                'brands' => $brands,
                'product' => $product,
                'category' => $category,
                'bulletpoints' => $bulletpoints,
                'variants' => $variants,
                'details' => $details,
                'related' => $relatedProducts,
            );

            return view('front_end.productDetails')->with('productsdata',$productsdata);

        }

       else {

           return view('front_end.error404');
       }
    }

}