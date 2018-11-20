<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
      $user = auth ()->user ();
      if ($user->hasRole ('Admin')) {
        $user->setMyRoleToAdmin ();
        return $next($request);
      } else {
          return redirect ()->intended ('/');
      }
    }
}
