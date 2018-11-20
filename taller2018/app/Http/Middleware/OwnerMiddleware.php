<?php

namespace App\Http\Middleware;

use Closure;

class OwnerMiddleware
{
  public function handle($request, Closure $next)
  {
    $user = auth ()->user ();
    if ($user->hasRole ('Owner')) {
      $user->setMyRoleToOwner ();
      return $next($request);
    } else {
      return redirect ()->intended ('/');
    }
  }
}
