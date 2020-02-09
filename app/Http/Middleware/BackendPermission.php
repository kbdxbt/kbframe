<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class BackendPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        if ($permission) {
            $this->checkPermission($permission);
        } else {
            $route = \Route::currentRouteName();

            $this->checkPermission($route);
        }

        return $next($request);
    }

    /**
     * 检测权限
     * @param $permission
     */
    protected function checkPermission($permission)
    {
        $user = user();

        if (!$user->hasRole(config('permission.superAdminRole'))) {
            if (!$user->can($permission)) {
                abort('403');
            }
        }
    }
}
