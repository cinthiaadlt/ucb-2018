<?php

namespace App\Http\Middleware;

use Closure;

class RedirectMiddleware
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
      if ($user->isAdmin ()) {
        return redirect ()->intended ('/');
      } else if ($user->isAdmin ()) {
        return redirect ()->intended ('/');
      } else {
        return redirect ()->intended ('/');
      }
        return $next($request);
    }
}
