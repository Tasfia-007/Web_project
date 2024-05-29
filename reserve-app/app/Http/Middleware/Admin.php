<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//admin verify and next req

class Admin
{
   
    public function handle(Request $request, Closure $next)
    {
      $user = $request->session()->get('user');

    if (!$user || !$user->is_admin) {
        abort(403);
    }

    return $next($request);
    }
}
