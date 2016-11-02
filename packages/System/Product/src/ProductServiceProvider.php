<?php


namespace System\product;

use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load route file
        if(! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../config/image.php', 'product-image');
        $this->mergeConfigFrom(__DIR__ . '/../config/menu.php', 'product-menu');

        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'product');

        // Load menu sidebar
        $this->menu();
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

    private function menu()
    {
        MenuLoader::load('AdminSidebarLeft', config('product-menu.admin_product'));
    }
}