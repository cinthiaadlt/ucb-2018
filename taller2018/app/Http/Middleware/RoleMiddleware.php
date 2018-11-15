<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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
      $user=auth ()->user ();
      if ($user->getRole () == 1) {
        return redirect ()->intended ('/admin');
      }
      if ($user->getRole () == 2) {
        return redirect ()->intended ('/owner');
      }
      if ($user->getRole () == 3) {
        return redirect ()->intended ('/user');
      }
      return $next($request);
    }
}
