<?php

namespace App\Providers;

use App\Helper\CartHelper;
use App\Services\CountTotalService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


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
        Paginator::useBootstrap();

        // View compose
        View::composer('*', function ($view) {
            $cart = new CartHelper();
            $total_item = new CountTotalService();

            $view->with([
                'cart' => $cart,
                'total_item' => $total_item,
            ]);
        });
    }
}
