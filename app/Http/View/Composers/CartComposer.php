<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 10/02/2019
 * Time: 20:35
 */


namespace App\Http\View\Composers;
use App\Cart;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartComposer
{
    public function compose(View $view)
    {
        $user = auth()->id() ?? 0;

        // do your query with the $userId

        $temp=Cart::where('user_id',$user)
            ->join('products','carts.product_id','=','products.id')
            ->select('carts.*','products.id as product','products.name as productname')
            ->get();

        $number=Cart::where('user_id',$user)->sum('quantity');


        $view->with('cartnumber', $number)
            ->with('cartitems', $temp);
    }
}

