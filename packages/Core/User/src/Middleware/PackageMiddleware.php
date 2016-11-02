<?php


namespace Trungtv\User\Http\Middleware;

use Closure;

class PackageMiddleware
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
        dd('tran viet trung');
        return $next($request);
    }
}