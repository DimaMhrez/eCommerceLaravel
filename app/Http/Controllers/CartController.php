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
           $item=ProductVariant::where('product_id',$request->itemid)
               ->join('products','product_variants.product_id','=','products.id')
               ->select('products.*')
               ->first();

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
