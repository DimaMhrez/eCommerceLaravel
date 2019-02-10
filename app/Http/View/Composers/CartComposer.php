<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 10/02/2019
 * Time: 20:35
 */


namespace App\Http\View\Composers;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartComposer
{
    public function compose(View $view)
    {
        $user = auth()->id() ?? 0;

        // do your query with the $userId
        $temp=DB::select('Select p.id,p.normalPrice,p.name from products p INNER JOIN carts c INNER JOIN product_variants pv ON c.product_variant_id=pv.id and pv.product_id=p.id and c.user_id='.$user);

        $view->with('cartnumber', count($temp))
            ->with('cartitems', $temp);
    }
}

