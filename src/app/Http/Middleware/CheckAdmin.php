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
            return redirect('/dashboard')
            ->with('error', "Você não tem permissão para acessar essa área. Use uma conta de Administrador!");
        }

            
    }
}
