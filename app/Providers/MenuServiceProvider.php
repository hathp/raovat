<?php

namespace Hoster\Providers;

use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;
use Log;
use Menu;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        MenuLoader::load('AdminSidebarLeft', config('admin-menu.admin_user'));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
