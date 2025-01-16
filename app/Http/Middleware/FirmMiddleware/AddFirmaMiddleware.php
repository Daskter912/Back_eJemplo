<?php

namespace App\Http\Middleware\FirmMiddleware;

use App\Models\Firmas;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddFirmaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'nombre'        =>      'required|string',
            'cargo'         =>      'required|string',
            'matricula'     =>      'required|string|max:12|min:9',
        ]);

        $matricula = $request->matricula;
        $correo = $request->correo;
        
        if (Firmas::where('matricula', $matricula)->exists()) {
            return response()->json(['message' => 'Esta Matricula ya existe'], 400);
        }
        
        if (Firmas::where('correo', $correo)->exists()){
            return response()->json(['message' => 'Esta Correo ya existe'], 400);
        }
        
        return $next($request);
    }
}
