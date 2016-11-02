<?php


namespace System\Setting;


use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Load route file
        if(! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../config/menu.php', 'setting-menu');
        $this->mergeConfigFrom(__DIR__ . '/../config/image.php', 'setting-image');
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'hoster-config');

        // Load menu
        MenuLoader::load('AdminSidebarLeft', config('setting-menu.admin_setting'));
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