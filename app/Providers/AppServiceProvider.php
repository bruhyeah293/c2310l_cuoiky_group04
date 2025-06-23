<?php

namespace App\Providers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
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
            // Truyền dữ liệu giỏ hàng
            $view->with('cart', \Gloudemans\Shoppingcart\Facades\Cart::content());

            // Truyền dữ liệu tin nhắn chưa đọc
            $unreadContacts = DB::table('contacts')
                ->whereColumn('created_at', 'updated_at')
                ->orderByDesc('created_at')
                ->get();

            $view->with('unreadContacts', $unreadContacts->take(4));
            $view->with('unreadCount', $unreadContacts->count());
        });

        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
