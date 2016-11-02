<?php


namespace System\Layout;

use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;

class LayoutServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load route file
        if(! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../config/image.php', 'layout-image');
        $this->mergeConfigFrom(__DIR__ . '/../config/menu.php', 'layout-menu');

        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'layout');

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
        MenuLoader::load('AdminSidebarLeft', config('layout-menu.admin_layout'));
    }
}