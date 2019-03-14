<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\View;

class CartController extends Controller
{
    //

    public function add(Request $request){

           $userID=Auth::user()->id;

           $itemID=$request->itemid;
           $item=Product::find($itemID);

           //Controllo se c'è già nel carrello.
           $carts=Cart::where('user_id',$userID)->get();
           $already=false;

           foreach($carts as $cart)
           {
               if($cart->product_id == $item->id)
               {$already=true;}
           }

           if($already){
               $toupdate=Cart::where('product_id',$item->id)
               ->where('user_id',$userID)->first();
               $toupdate->quantity=$toupdate->quantity+$request->number;
               $toupdate->totalprice=$toupdate->totalprice+($item->normalPrice*$request->number);

               $toupdate->save();

               //Compongo la nuova view CartPart.


               $view = View::make('front_end.CartPart');
               $sections = $view->renderSections();
               return $sections['cartpart']; }


           $cartitem = new Cart();

           $cartitem->quantity = $request->number;
           $cartitem->totalprice = $item->normalPrice * $cartitem->quantity;
           $cartitem->user_id = $userID;
           $cartitem->product_id = $item->id;

           $cartitem->save();

           //Compongo la nuova view CartPart.


           $view = View::make('front_end.CartPart');
           $sections = $view->renderSections();

           return $sections['cartpart'];

    }


    public function show(){
        //Prendo l'ID dell'utente, tanto è loggato per forza perché lo controlla il middleware.



        $id=Auth::user()->id;

        //Prendo gli item nel carrello di quel particolare utente.

        $items=Cart::where('user_id',$id)
            ->join('products','products.id','=','carts.product_id')
            ->select('carts.quantity','carts.id as cartid','carts.totalprice','products.*','photos.URL as URL')
            ->join('photos','photos.product_id','=','products.id')
            ->where('photos.main','1')
            ->get();


        $sum=Cart::where('user_id',$id)->sum('totalprice');
        $data=array(

            'items' => $items,
            'sum' => $sum,
        );

        return view('front_end.shoppingCart')->with('data',$data);

    }


    public function remove(Request $request)
    {

        if ($request->ajax()) {

            Cart::find($request->id)->delete();

            $id = Auth::user()->id;
            $items = Cart::where('user_id', $id)
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->select('carts.quantity', 'carts.id as cartid', 'carts.totalprice', 'products.*')
                ->get();


            $sum = Cart::where('user_id', $id)->sum('totalprice');
            $data = array(

                'items' => $items,
                'sum' => $sum,
            );

            $view = View::make('front_end.CartTable')->with('data', $data);
            $sections = $view->renderSections();
            return $sections['table'];


        }
        else{return view('front_end.error404');}
    }

}


