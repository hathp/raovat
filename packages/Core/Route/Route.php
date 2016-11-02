<?php


namespace Core\Route;

use Request;

class Route
{
    public static function getPrefixRouteName()
    {
        $route_name = \Route::currentRouteName();

        if( ! empty($route_name)) {
            $prefix_route_name = substr($route_name, 0, strrpos($route_name, '.') + 1);
            return $prefix_route_name;
        }
        else {
            return null;
        }

    }

    public static function getPrefixControllerName()
    {
        if(!empty(\Route::getCurrentRoute()))
            $controller = \Route::getCurrentRoute()->getActionName();

        if(empty($controller)) {
            return null;
        }
        else {
            $controller_namespace = config('app.controller_namespace');
            $prefix_controller_name = str_replace($controller_namespace, '', $controller);
            return $prefix_controller_name;
        }
    }

    public static function getActionMethodName()
    {
        if(!empty(\Route::getCurrentRoute()))
            $controller = \Route::getCurrentRoute()->getActionName();

        if(empty($controller)) {
            return null;
        }
        else {
            return substr($controller, strrpos($controller, '@'), strlen($controller));
        }
    }

    public static function parseUri($index = null)
    {
        if(empty(Request::route())) return;
        $uri = Request::route()->getUri();
        $uri_array = explode('/', $uri);

        if(is_integer($index)) {
            return isset($uri_array[$index]) ? $uri_array[$index] : null;
        }
        else {
            return $uri_array;
        }
    }
}