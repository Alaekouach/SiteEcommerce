<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Cart;
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
        //
        View::composer(['siteecommerce.template-accueil','siteecommerce.product.template-products','siteecommerce.profil.template-profil'], function ($view) {
            $view->with([
                'cartCount' => Cart::getTotalQuantity(), 
                'cartTotal' => Cart::getTotal(),
            ]);
        });
        
        Paginator::useBootstrap();
        
    }
}
