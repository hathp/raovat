<?php

namespace Hoster\Http\Middleware;

use Closure;
use Gate;

class Permission
{

    private $exclude_action = [
        'admin.dashboard.index',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route_name = $request->route()->getName();

        if(in_array($route_name, $this->exclude_action)) {
            return $next($request);
        }

        if(Gate::denies('do-this-action', $route_name)) {
            flash()->warning("You don't have permission to perform this action");
            return redirect(route('admin.dashboard.index'));
        }

        return $next($request);
    }
}
