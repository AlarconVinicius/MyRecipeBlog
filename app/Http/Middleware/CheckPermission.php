<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        // Admin tem todas as permissões
        if(auth()->user()->role->nome === 'administrador')
            return $next($request);
        // 1- Pegar o nome da rota
        $route_name = $request->route()->getName();
        // 2 - Pegar as permissões da pessoa autenticada
       $routes_arr = auth()->user()->role->permissions->toArray();
        // 3- Comprar a rota com as permissões da pessoa
        foreach($routes_arr as $route)
        {
            // 4- Se a rota for uma dessas permissões
            if($route['nome'] === $route_name)
            {
                // 5- Permitir acesso
                return $next($request);
            }
        }
        // 6- Senão 403 Acesso Não Autorizado
        abort(403, 'Acesso Negado | Não Autorizado');
        
    }
}
