<?php

namespace App\Http\Controllers;


use App\Brand;
use App\BulletDescription;
use App\Category;
use App\Message;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shipper;


class FrontEndController extends Controller
{
    //
    public function index()
    {
        //Prepara i prodotti da mostrare. Le query purtroppo si fanno complicate perché dobbiamo prendere anche le categorie.
        //Se non mostrassimo le categorie, per le query basterebbe la prima riga.

        $ShowcaseItems=Product::where('showcase','1')
            ->select('categories.name as category','products.*')
            ->join('category_has_product_variants','products.id','=','category_has_product_variants.product_id')
            ->join('categories','categories.id','=','category_has_product_variants.category_id')
            ->take(3)->get();


        $FeaturedItems=Product::where('featured','1')
            ->select('categories.name as category','products.*')
            ->join('category_has_product_variants','products.id','=','category_has_product_variants.product_id')
            ->join('categories','categories.id','=','category_has_product_variants.category_id')
            ->take(15)->get();

        $SpecialItems=Product::where('special','1')->
            select('categories.name as category','products.*')
            ->join('category_has_product_variants','products.id','=','category_has_product_variants.product_id')
            ->join('categories','categories.id','=','category_has_product_variants.category_id')
            ->take(5)->get();

        $onSaleItems=Product::whereNotNull('sale_id')
            ->select('categories.name as category','products.*')
            ->join('category_has_product_variants','products.id','=','category_has_product_variants.product_id')
            ->join('categories','categories.id','=','category_has_product_variants.category_id')
            ->take(15)->get();


            //Prendo i prodotti di diverse categorie.
        $Tv=Product::select('products.*','categories.name as category')
            ->join('category_has_product_variants','category_has_product_variants.product_id','=','products.id')
            ->join('categories','category_has_product_variants.category_id','=','categories.id')
            ->where('categories.name','TV & Video')
            ->select('products.*','categories.name as category')
            ->take(5)->get();

        $Smartphones=Product::select('products.*','categories.name as category')
            ->join('category_has_product_variants','category_has_product_variants.product_id','=','products.id')
            ->join('categories','category_has_product_variants.category_id','=','categories.id')
            ->where('categories.name','Smartphones')
            ->select('products.*','categories.name as category')
            ->take(5)->get();

        $PC=Product::select('products.*','categories.name as category')
            ->join('category_has_product_variants','category_has_product_variants.product_id','=','products.id')
            ->join('categories','category_has_product_variants.category_id','=','categories.id')
            ->where('categories.name','PC')
            ->select('products.*','categories.name as category')
            ->take(5)->get();

        $games=Product::select('products.*','categories.name as category')
            ->join('category_has_product_variants','category_has_product_variants.product_id','=','products.id')
            ->join('categories','category_has_product_variants.category_id','=','categories.id')
            ->where('categories.name','Video Games')
            ->select('products.*','categories.name as category')
            ->take(5)->get();


        $watches=Product::select('products.*','categories.name as category')
            ->join('category_has_product_variants','category_has_product_variants.product_id','=','products.id')
            ->join('categories','category_has_product_variants.category_id','=','categories.id')
            ->where('categories.name','Watches')
            ->select('products.*','categories.name as category')
            ->take(5)->get();

        $accessories=Product::select('products.*','categories.name as category')
            ->join('category_has_product_variants','category_has_product_variants.product_id','=','products.id')
            ->join('categories','category_has_product_variants.category_id','=','categories.id')
            ->where('categories.name','Accessories')
            ->select('products.*','categories.name as category')
            ->take(5)->get();


        $data=array(
            'Showcase' => $ShowcaseItems,
            'Featured' => $FeaturedItems,
            'Special' => $SpecialItems,
            'Sale' => $onSaleItems,
            'tv' => $Tv,
            'smartphones' => $Smartphones,
            'pc' => $PC,
            'games' => $games,
            'watches' => $watches,
            'accessories' => $accessories,
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


            //Prendo le recensioni. Il numero 5 è da aggiustare, dovremmo prenderne di più. Era solo per testare.
            $fivestars=Review::where('product_id',$id)
                ->where('rate',5)->take(5)->get();
            $fourstars=Review::where('product_id',$id)
                ->where('rate',4)->take(5)->get();
            $threestars=Review::where('product_id',$id)
                ->where('rate',3)->take(5)->get();
            $twostars=Review::where('product_id',$id)
                ->where('rate',2)->take(5)->get();
            $onestar=Review::where('product_id',$id)
                ->where('rate',1)->take(5)->get();

            $reviews=DB::select('select *,u.name as user from reviews,users u where reviews.user_id=u.id AND product_id='.$id);

            $shippers=Shipper::take(5)->get();

            $productid=$product->id;
            $userid=Auth::user()->id;
            $userreview=Review::where('user_id',$userid)
               ->where('product_id',$productid)->first();


            $arr = (array)$userreview;
            if (empty($arr)) {
                $usercanreview=true;
            }
            else $usercanreview=false;


            $productsdata= array(
                'brands' => $brands,
                'product' => $product,
                'category' => $category,
                'bulletpoints' => $bulletpoints,
                'variants' => $variants,
                'details' => $details,
                'related' => $relatedProducts,
                'fivestars' => $fivestars,
                'fourstars' =>$fourstars,
                'threestars' => $threestars,
                'twostars' => $twostars,
                'onestar' => $onestar,
                'reviews' =>$reviews,
                'shippers' => $shippers,
                'usercanreview' => $usercanreview,
            );

            return view('front_end.productDetails')->with('productsdata',$productsdata);

        }

       else {

           return view('front_end.error404');
       }
    }

}