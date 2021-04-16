<?php

namespace App\Providers;
use App\Cart;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('layout.main', function ($view) {
        //     $view->with('cartCount', Cart:getContent()->count());
        // });
    }
}
