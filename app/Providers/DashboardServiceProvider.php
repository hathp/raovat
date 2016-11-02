<?php

namespace Hoster\Providers;

use Core\Menu\MenuLoader;
use Illuminate\Support\ServiceProvider;
use Menu;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        $menu = [
                    ['label' => 'Dashboard', 'route' => 'admin.dashboard.index','name' => 'dashboard', 'icon' => 'fa fa-bicycle']
                ];

        MenuLoader::load('AdminSidebarLeft', $menu);
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
