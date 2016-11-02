<?php

namespace Hoster\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Menu::make('AdminSidebarLeft', function($menu) {});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
