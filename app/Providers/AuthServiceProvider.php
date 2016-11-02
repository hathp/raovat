<?php

namespace Hoster\Providers;

use Hoster\Model\User\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Cache;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Hoster\Model' => 'Hoster\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies($gate);

        $gate->before(function ($user) {
            if ($user->isSuperAdmin()) {
                return true;
            }
        });

        $gate->define('do-this-action', function(User $user, $route_name){
            Cache::forget('permissions');
            if(Cache::has('permissions')) {
                $permissions = Cache::get('permissions');
            }
            else {
                $route_permission = $user->permissions()->lists('route_name')->toArray();

                $permissions = [];
                foreach ($route_permission as $key => $permission) {
                    if(strstr($permission, '|')) {
                        foreach(explode('|', $permission) as $single_permission) {
                            $permissions[] = $single_permission;
                        }
                    }
                    else {
                        $permissions[] = $permission;
                    }
                }

                Cache::put('permissions', $permissions, 120);
            }

            return in_array($route_name, $permissions);
        });
    }
}
