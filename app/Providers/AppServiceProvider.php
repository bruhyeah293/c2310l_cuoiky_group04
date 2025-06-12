<?php

namespace App\Providers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('cart', Cart::content());
        });
        Paginator::useBootstrap();
    }
}
