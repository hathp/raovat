<?php


namespace System\Classified;

use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;

class ClassifiedsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load route file
        if(! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../config/image.php', 'classifieds-image');
        $this->mergeConfigFrom(__DIR__ . '/../config/menu.php', 'classifieds-menu');

        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'classified');

        // Load menu sidebar
        MenuLoader::load('AdminSidebarLeft', config('classifieds-menu'));
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