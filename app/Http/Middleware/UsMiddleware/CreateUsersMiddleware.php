<?php

namespace App\Http\Middleware\UsMiddleware;

use App\Models\Usuarios;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $nomUsuario = $request-> nomUsuario;
        $matricula = $request-> matricula;

        if(Usuarios::where('matricula', $matricula)->exists()){
            return response()->json(['message' => 'Esta Matricula ya existe'], 400);
        }

        if(Usuarios::where('nomUsuario', $nomUsuario)->exists()){
            return response()->json(['message' => 'Este nombre de usuario ya existe'], 400);
        }
        return $next($request);
    }
}
