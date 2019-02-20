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
           $cartitem->product_variant_id = $item->id;

           $cartitem->save();

           return ('Success');
       }
    }
}
