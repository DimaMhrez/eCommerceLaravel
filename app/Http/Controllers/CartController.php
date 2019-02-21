<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function add(Request $request){

        if(Auth::guest()){
            return "login first!";
        }
       else {
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
               $toupdate=Cart::where('product_id',$item->id)->first();
               $toupdate->quantity=$toupdate->quantity+$request->number;
               $toupdate->totalprice=$toupdate->totalprice+($item->normalPrice*$request->number);

               $toupdate->save();

               return "Success";}


           $cartitem = new Cart();

           $cartitem->quantity = $request->number;
           $cartitem->totalprice = $item->normalPrice * $cartitem->quantity;
           $cartitem->user_id = $userID;
           $cartitem->product_id = $item->id;

           $cartitem->save();

           return ('Success');
       }
    }


    public function show(){
        //Prendo l'ID dell'utente, tanto è loggato per forza perché lo controlla il middleware.

        $id=Auth::user()->id;

        //Prendo gli item nel carrello di quel particolare utente.

        $items=Cart::where('user_id',$id)
            ->join('products','products.id','=','carts.product_id')
            ->select('carts.quantity','carts.id as cartid','carts.totalprice','products.*')
            ->get();

        // Store a piece of data in the session...
        session(['user' => $id]);

        $url=urlencode(session('user'));

        $sum=Cart::where('user_id',$id)->sum('totalprice');
        $data=array(

            'items' => $items,
            'sum' => $sum,
            'url' => $url,
        );

        return view('front_end.shoppingCart')->with('data',$data);

    }


    public function remove(Request $request){

        Cart::find($request->id)->delete();

    }




    public function payment($session){

        return view('front_end.paymentMethods');
    }
}


