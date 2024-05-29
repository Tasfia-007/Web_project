<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
{
    
    public function handle(Request $request, Closure $next)
    {
      $user = $request->session()->get('user');

      if (!$user || $user->is_admin) {
          abort(403);
      }
  
      return $next($request);
    }
}
