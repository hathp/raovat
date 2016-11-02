<?php

namespace Hoster\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                if($request->is('admin*')) {
                    return redirect()->guest('admin/login');
                }
                \Request::session()->flash('need_to_login', 1);
                return redirect()->guest('/');
            }
        }

        return $next($request);
    }
}
