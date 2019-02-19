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
            ->join('product_variants','product_variants.id','=','carts.product_variant_id')
            ->join('products','products.id','=','product_variants.product_id')
            ->select('products.name as productname','products.id as product','carts.*')
            ->get();

        $view->with('cartnumber', count($temp))
            ->with('cartitems', $temp);
    }
}

