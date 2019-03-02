<?php

namespace App\Http\Controllers;


use App\Brand;
use App\BulletDescription;
use App\Category;
use App\Message;
use App\Photo;
use App\ProductVariant;
use App\Review;
use App\User;
use App\UserPreferences;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shipper;


class FrontEndController extends Controller
{
    //
    public function index()
    {   //Algoritmo che prepara le preferenze. E' un po' costoso eseguirlo ad ogni caricamento della home.
        $totalp=new Collection();

        if(!Auth::guest()) {

            $preferences = UserPreferences::orderby('created_at', 'desc')
                ->where('user_id',Auth::user()->id)
                ->take(30)
                ->get();

            //Ora abbiamo le ultime 30 ricerche/click dell'utente loggato.

            $categoriesp=UserPreferences::select(DB::raw('COUNT(*) as count, category_id'))
                ->where('user_id',Auth::user()->id)
                ->groupBy('category_id')
                ->orderBy(DB::raw('COUNT(*)'),'desc')
                ->take(3)
                ->get();

           //Ora abbiamo le tre categorie più cercate dall'utente.
            foreach($categoriesp as $cp) {
                $cat = ($cp->count)/3;

                $catproducts= Product::where('category_id',$cp->category_id)
                    ->take($cat)
                    ->join('photos','photos.product_id','=','products.id')
                    ->where('photos.main','1')
                    ->get();

                $totalp=$totalp->merge($catproducts);

            }

            //Sostanzialmente prendiamo una quantità di oggetti per ogni categoria preferita dall'utente.
            //In particolare, ne prendiamo in relazione a quanto quella categorie è preponderante sulle altre.

           /* while(count($totalp)<9)
            {
                $p=Product::inRandomOrder()->first();

                $totalp->push($p);
            } */

            //Se così facendo non arriviamo a 9 oggetti, lo riempiamo con item random. Soluzione temporanea.

        }



        //Prepara i prodotti da mostrare. Le query purtroppo si fanno complicate perché dobbiamo prendere anche le categorie.
        //Se non mostrassimo le categorie, per le query basterebbe la prima riga.

        $ShowcaseItems=Product::where('showcase','1')
            ->join('categories','categories.id','=','products.category_id')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->select('categories.name as category','products.*','photos.URL')
            ->orderBy('created_at','desc')
            ->take(3)
            ->get();

        $ShowFeatured=Product::where('featured','1')
            ->select('categories.name as category','products.*','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->orderBy('created_at','desc')
            ->take(2)
            ->get();


        $FeaturedItems=Product::where('featured','1')
            ->select('categories.name as category','products.*','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->orderBy('created_at','desc')
            ->take(15)
            ->get();

        $SpecialItems=Product::where('special','1')->
            select('categories.name as category','products.*','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->take(15)
            ->get();

        $onSaleItems=Product::whereNotNull('sale_id')
            ->select('categories.name as category','products.*','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->take(15)
            ->get();



        //Prendo i prodotti di diverse categorie.
        $Tv=Product::select('products.*','categories.name as category','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->where('categories.name','TV & Video')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->take(5)->get();

        $Smartphones=Product::select('products.*','categories.name as category','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->where('categories.name','Smartphones')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->take(5)->get();

        $PC=Product::select('products.*','categories.name as category','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->where('categories.name','PC')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->take(5)->get();

        $games=Product::select('products.*','categories.name as category','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->where('categories.name','Video Games')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->take(5)->get();


        $watches=Product::select('products.*','categories.name as category','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->where('categories.name','Watches')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->take(5)->get();

        $accessories=Product::select('products.*','categories.name as category','photos.URL')
            ->join('categories','categories.id','=','products.category_id')
            ->where('categories.name','Accessories')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->take(5)->get();



        $data=array(
            'Showcase' => $ShowcaseItems,
            'Featured' => $FeaturedItems,
            'Showfeatured' => $ShowFeatured,
            'Special' => $SpecialItems,
            'Sale' => $onSaleItems,
            'tv' => $Tv,
            'smartphones' => $Smartphones,
            'pc' => $PC,
            'games' => $games,
            'watches' => $watches,
            'accessories' => $accessories,
            'preferences' => $totalp,
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
                ->join('products','categories.id','=','products.category_id')
                ->where('products.id',$id)
                ->first();

            $categories=Category::all();

            //Faccio la insert tra le preferenze dell'utente.
            if(!Auth::guest()) {
                $preference = new UserPreferences();
                $preference->user_id = Auth::user()->id;
                $preference->product_id= $product->id;
                $preference->category_id=$category->id;

                $preference->save();
            }

            //Se possibile, sarebbe carino riscrivere queste query con Eloquent (ci ho provato ma sembra non funzionare)
            $bulletpoints=BulletDescription::select('bullet_descriptions.id','bullet_descriptions.description')
                ->where('product_id',$id)
                ->get();

            $images=Photo::where('product_id',$id)
                ->get();

            // $bulletpoints=DB::select('select bd.id, bd.description from bullet_descriptions bd where product_id='.$id);

            $relatedProducts=Product::join('categories','products.category_id','=','categories.id')
                ->join('photos','photos.product_id','=','products.id')
                ->where('photos.main','1')
                ->where('categories.id',$category->id)
                ->select('categories.name as category','products.*','photos.URL as URL')
                ->take(15)
                ->get();

           //  $relatedProducts=DB::select('select p.* from products p INNER JOIN category_has_products pv where p.id=pv.product_id AND pv.category_id='.$category->id);


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

            $reviews=Review::join('users','users.id','=','reviews.user_id')
                ->where('reviews.product_id',$id)
                ->select('reviews.*','users.name as user')
                ->get();


           // $reviews=DB::select('select *,u.name as user from reviews,users u where reviews.user_id=u.id AND product_id='.$id);

            $shippers=Shipper::take(5)->get();

            $productid=$product->id;

            if(!Auth::guest()){
            $userid=Auth::user()->id;
            $userreview=Review::where('user_id',$userid)
               ->where('product_id',$productid)->first();


            $arr = (array)$userreview;
            if (empty($arr)) {
                $usercanreview=true;
            }
            else $usercanreview=false;}
            else $usercanreview=false;




            $productsdata= array(
                'categories' => $categories,
                'brands' => $brands,
                'product' => $product,
                'category' => $category,
                'bulletpoints' => $bulletpoints,
                'related' => $relatedProducts,
                'fivestars' => $fivestars,
                'fourstars' =>$fourstars,
                'threestars' => $threestars,
                'twostars' => $twostars,
                'onestar' => $onestar,
                'reviews' =>$reviews,
                'shippers' => $shippers,
                'usercanreview' => $usercanreview,
                'images' => $images,
            );

            return view('front_end.productDetails')->with('productsdata',$productsdata);

        }

       else {

           return view('front_end.error404');
       }
    }

    public function allproducts(){

        $categories=Category::all();
        $products=DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.*','categories.name as category')
            ->paginate(20);

        $bullets=BulletDescription::all();

        $brands=Brand::take(10)->get();

        $productsnumber=Product::count();


        $data=array(
            'category' => $categories,
            'products' => $products,
            'brands' => $brands,
            'productsnumber' => $productsnumber,
            'bullets' => $bullets,
        );


        return view('front_end.ListProducts')->with('data',$data);
    }

    public function filter(Request $request){

        $category=(array)$request->category;
        $brand=(array)$request->brand;
        $catfilter=array();
        $brandfilter=array();

        if(!empty($category))
        {
            for($i=0;$i<count($category);$i++)
            {
                $catfilter[$i]= Product::where('category_id',$category[$i])
                ->join('photos','photos.product_id','=','products.id')
                ->where('photos.main','1')
                ->get();

            }
        }

        if(!empty($brand))
        {
            for($j=0;$j<count($brand);$j++)
            {
                $brandfilter[$j]= Product::where('brand_id',$brand[$j])
                    ->join('photos','photos.product_id','=','products.id')
                    ->where('photos.main','1')
                    ->get();

            }
        }

        $bullets=BulletDescription::all();
        $total=new Collection();
        for($i=0;$i<count($category);$i++)
        {
            $total=$total->merge($catfilter[$i]);
        }

        for($j=0;$j<count($brand);$j++)
        {
            $total=$total->merge($brandfilter[$j]);
        }

        $data=array(
            'products' => $total,
            'productsnumber' => count($total),
            'bullets' => $bullets
        );

        return view('front_end.FilterList')->with('data',$data);


    }

    public function search(Request $request){
        $string=$request->researchstring;
        $category=$request->category;

        $categorypreference=Category::where('name',$category)
            ->select('id')
            ->first();

        if($category=='All Categories')
        {
            $products=Product::where('products.name','like','%'.$string.'%')
            ->join('photos','photos.product_id','=','products.id')
                ->where('photos.main','1')
            ->get();
        }
        else {
            $products = Product::where('products.name', 'like', '%' . $string . '%')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('photos','photos.product_id','=','products.id')
                ->where('photos.main','1')
                ->select('products.*','photos.URL as URL')
                ->where('categories.name', $category)
                ->get();
        }

        //Faccio la insert nelle preferenze.
        if(!Auth::guest() && !empty($string)) {
            foreach($products as $product)
            {
                $preference=new UserPreferences();
                $preference->user_id=Auth::user()->id;
                $preference->product_id=$product->id;
                $preference->category_id=$product->category_id;

                $preference->save();
            }

        }
        $categories=Category::all();
        $bullets=BulletDescription::all();

        $brands=Brand::take(10)->get();

        $productsnumber=count($products);



        $data=array(
            'category' => $categories,
            'products' => $products,
            'brands' => $brands,
            'productsnumber' => $productsnumber,
            'bullets' => $bullets,
        );

        return view('front_end.ListProducts')->with('data',$data);
    }
}