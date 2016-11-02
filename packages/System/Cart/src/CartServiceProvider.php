<?php

namespace System\Cart;

use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load route file
        if(! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Merge config
//        $this->mergeConfigFrom(__DIR__ . '/../config/image.php', 'cart-image');
        $this->mergeConfigFrom(__DIR__ . '/../config/menu.php', 'cart-menu');

        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cart');

        // Load menu sidebar
        MenuLoader::load('AdminSidebarLeft', config('cart-menu'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}