<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role->nome === 'administrador')
            return $next($request);
        abort(403, 'Não autorizado');
    }
}
