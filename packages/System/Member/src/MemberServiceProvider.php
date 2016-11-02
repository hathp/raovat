<?php


namespace System\Member;

use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;

class MemberServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load route file
        if(! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../config/image.php', 'member-image');
        $this->mergeConfigFrom(__DIR__ . '/../config/menu.php', 'member-menu');

        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'member');

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
        MenuLoader::load('AdminSidebarLeft', config('member-menu.admin_member'));
    }
}