<?php

namespace Hoster\Providers;

use Core\Route\Route;
use DOMDocument;
use DOMXPath;
use Hoster\Model\User\Role;
use Illuminate\Support\ServiceProvider;
use Request;

class ViewComposerProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->userForm();
        $this->controllerName();
        $this->user();
//        $this->adminMenuSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    private function userForm()
    {
        view()->composer('admin.user.partials.form', function($view) {
            $roles = Role::all();

            $view->with('roles', $roles);
        });
    }

    /**
     * Compose current route information with view
     *
     * @internal param Request $request
     * @internal param Route $route
     * @internal param Route $route
     */
    private function controllerName()
    {
        view()->composer('*', function ($view) {
            $prefix_route_name = Route::getPrefixRouteName();
            $prefix_controller_name = Route::getPrefixControllerName();
            $action_method_name = Route::getActionMethodName();

            if( ! empty($prefix_route_name)) {
                $view->with('prefix_route_name', $prefix_route_name);
            }

            if( ! empty($prefix_controller_name)) {
                $view->with('prefix_controller_name', $prefix_controller_name);
            }

            if( ! empty($action_method_name)) {
                $view->with('action_method_name', $action_method_name);
            }
        });
    }

    private function user()
    {
        view()->composer('admin.layout.partials.layout-header-top', function ($view) {
            $user = \Auth::user();
            $view->with(['user' => $user]);
        });
    }

    private function adminMenuSidebar()
    {
//        $menu = \Menu::get('AdminSidebarLeft')->asUl(['class' => 'page-sidebar-menu page-header-fixed', 'data-keep-expanded' => 'false', 'data-auto-scroll' => 'true', 'data-slide-speed' => '200', 'style' => 'padding-top: 20px']);

//        $menu = str_get_html()

//        $dom = new DOMDocument();
//        $dom->loadHTML($menu);

//        $xpath = new DOMXPath($dom);
//        $sub_menu = $hrefs = $xpath->

//        $menu = \phpQuery::newDocument($menu)->find('ul.page-sidebar-menu > li > ul')->addClass('sub-menu');


    }

}
