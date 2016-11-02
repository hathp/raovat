<?php

namespace Hoster\Http\Controllers\Admin;

use Hoster\Http\Requests;
use Hoster\Http\Controllers\Controller;
use Request;

class AdminBaseController extends Controller
{
    protected function redirectTo($action = 'index')
    {
        // get route name
        $route_name = Request::route()->getName();

        if(empty($route_name)) {
            // if route name is empty, get controller action instead
            $controller = Request::route()->getActionName();
            // remove controller namespace
            $controller = str_replace('Hoster\Http\Controllers\\', '', $controller);
            //remove controller action
            $controller = substr($controller, 0, strrpos($controller, '@') + 1);

            // Redirect to desired action
            return redirect(action($controller . $action));
        }
        else {
            // remove last part of route name
            $controller_name = substr($route_name, 0, strrpos($route_name, '.') + 1);

            // Redirect to desired route name
            return redirect(route($controller_name . $action));
        }

    }
}
