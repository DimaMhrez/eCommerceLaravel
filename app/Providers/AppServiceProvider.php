<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\MainMenu;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot() {

        //Questo crea la composizione del carrello.
        View::composer('*', 'App\Http\View\Composers\CartComposer');

        View::share('main_menus', MainMenu::OrderBy('Order', 'asc')->get());

        View::share('categories', Category::OrderBy('sortOrder', 'asc')->get());

        View::share('ourbrand', Brand::find(1));

        //Otteniamo l'ID dell'utente loggato, e di conseguenza il suo carrello. Non so se questo deve stare qui, magari si sposta.


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