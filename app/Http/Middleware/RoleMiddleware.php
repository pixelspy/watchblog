<?php

namespace WatchBlog\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
      if (Auth::guest())
        {
          return redirect('login');
        }

        $permission = false;

        foreach ($roles as $role) {
            if ($request->user()->hasRole($role)) {
                $permission = true;
            }
        }

        if ($permission == false) {
            abort(403);
        }

        return $next($request);
      }
}
