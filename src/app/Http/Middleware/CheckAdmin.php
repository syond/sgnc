<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
{

    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->nivel == 1)
        {
            return $next($request);
        }
        else
        {
            return redirect('/login')
            ->with(['error' => "You do not have the permission to enter this site. Please login with correct user."]);
        }

            
    }
}
