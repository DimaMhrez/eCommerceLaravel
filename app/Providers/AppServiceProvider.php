<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MainMenu;
use App\Category;
use Illuminate\Support\Facades\View;
use App\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        if(!Auth::guest()){
        $user=Auth::user()->id;}
        else {
            $user=0;
        }
        $menu = MainMenu::OrderBy('Order', 'asc')->get();
        $cat = Category::OrderBy('sortOrder', 'asc')->get();
        $brand = Brand::find(1);
       /* $id=Auth::user()->id;
       $cartitems = Cart::where('user_id',$id)->count();
       Qui va implementato il count degli oggetti nel cart per l'user attualmente loggato */

       //COSTRUZIONE DEL CARRELLO

       //Qui prendiamo i prodotti nel carrello. Cambiare l'ultima cifra per essere dinamica.
       $temp=DB::select('Select * from products p, carts c, product_variants pv where c.product_variant_id=pv.id and pv.product_id=p.id and c.user_id='.$user);

       //Questo è il numero di elementi nel carrello.
        $cartitems=count($temp);

        //Questo è il prezzo totale nel carrello. Di nuovo da cambiare l'ultima cifra.
        $temp2=DB::select('Select totalprice from carts c where user_id='.$user);
        $somma=array_sum($temp2);
        //Questo ancora non funziona e c'è da capire perché.


        $data = array(
            'main_menus' => $menu,
            'categories' => $cat,
            'ourbrand' => $brand,
            'cartnumber' => $cartitems,
            'cartproducts' => $temp,
            'totalprice' => $somma,
            'activeuser' => $user
        );



        View::share('data', $data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
