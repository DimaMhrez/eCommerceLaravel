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

        $menu = MainMenu::OrderBy('Order', 'asc')->get();
        $cat = Category::OrderBy('sortOrder', 'asc')->get();
        $brand = Brand::find(1);

        $data = array(
            'main_menus' => $menu,
            'categories' => $cat,
            'ourbrand' => $brand,
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
