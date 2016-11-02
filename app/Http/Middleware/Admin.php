<?php

namespace Hoster\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if user is admin, continue next request
        if(auth()->user()->isAdmin()) {
            return $next($request);
        }
        else {
            // if not, logout user and redirect to homepage
            auth()->logout();
            return redirect('/');
        }
    }
}
