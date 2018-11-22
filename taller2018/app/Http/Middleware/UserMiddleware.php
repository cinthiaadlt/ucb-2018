<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
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
      $user = auth ()->user ();
      if ($user->hasRole ('User')) {
        $user->setMyRoleToUser ();
        return $next($request);
      } else {
          return redirect ()->intended ('/');
      }
    }
}
