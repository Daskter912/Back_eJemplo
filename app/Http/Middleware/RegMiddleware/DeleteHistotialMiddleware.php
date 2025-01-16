<?php

namespace App\Http\Middleware\RegMiddleware;

use App\Models\Historial;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteHistotialMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request-> user();

        $deleteH = Historial::find($request -> route('id'));

        if($user ==='Administrador'){
            return response()->json(['success' => 1, 'message' => 'Error al eliminar del historial']);
        }

        if(!$deleteH){
            return response()->json(['message' => 'Id no encontrada'],400);
        }

        return $next($request);
    }
}
