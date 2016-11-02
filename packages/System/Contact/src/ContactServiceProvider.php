<?php


namespace System\Contact;

use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load route file
        if(! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Merge config

        $this->mergeConfigFrom(__DIR__ . '/../config/menu.php', 'contact-menu');

        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contact');

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
        MenuLoader::load('AdminSidebarLeft', config('contact-menu.admin_contact'));
    }
}