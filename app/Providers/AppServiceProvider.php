<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MainMenu;
use App\Category;
use Illuminate\Support\Facades\View;
use App\Brand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot() {

        View::share('main_menus', MainMenu::OrderBy('Order', 'asc')->get());

        View::share('categories', Category::OrderBy('sortOrder', 'asc')->get());

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