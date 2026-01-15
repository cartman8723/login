<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class VerifyRoleMiddleware
{
    public function handle($request, Closure $next)
    {
        $route = \Request::route()->getName();
        if ($route != "login") {
            if (empty(session('PERMISSIONS'))) {
                $permissions = [];
                $rolesAuth = Auth::user()->roles()->pluck('id')->toArray();
                $permissionsUser = Auth::user()->getDirectPermissions();
                foreach ($permissionsUser as $permission) {
                    $permissions [] = $permission->name;
                }
                $roles = Role::whereIn('id', $rolesAuth)->get();
                foreach ($roles as $role) {
                    $permissions = array_merge($permissions, $role->permissions->pluck('name')->toArray());
                }
                session(['PERMISSIONS' => $permissions]);
            }
            if(!in_array($route, session('PERMISSIONS'))) {
                // return abort(419);
            }
            return $next($request);
        }
        return $next($request);
    }
}
