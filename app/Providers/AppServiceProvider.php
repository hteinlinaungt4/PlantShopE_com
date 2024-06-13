<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();


        View::composer('user/master/layout', function ($view) {
            if(Auth::check()){
                $orderCount = Order::where('user_id',Auth::user()->id)->count();
                $cartCount = Cart::where('user_id',Auth::user()->id)->count();

                $view->with('orderCount', $orderCount)
                ->with('cartCount', $cartCount);
            }

        });
    }
}
