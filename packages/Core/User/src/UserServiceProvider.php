<?php


namespace Trungtv\User;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Load the route file
        if (! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Load view files
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'user');

    }

}