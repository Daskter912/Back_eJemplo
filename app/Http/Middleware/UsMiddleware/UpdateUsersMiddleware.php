<?php

namespace App\Http\Middleware\UsMiddleware;

use App\Models\Usuarios;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

       
        $request->validate([
            'nomUsuario'        =>      'required|string',
            'matricula'         =>      'required',
            'clave'     =>          'required',
            'permiso'        =>      'required'
        ]);

        // $nomUsuario = $request-> nomUsuario;
        // $matricula = $request-> matricula;

        // if(Usuarios::where('matricula', $matricula)->exists()){
        //     return response()->json(['message' => 'Esta Matricula ya existe'], 400);
        // }

        // if(Usuarios::where('nomUsuario', $nomUsuario)->exists()){
        //     return response()->json(['message' => 'Este nombre de usuario ya existe'], 400);
        // }

        $update = Usuarios::find($request -> route('id'));
        if(!$update){
            return response()->json(['message' => 'Error de servidor'],400);
        }

        if(!$update){
            return response()->json(['message' => 'Error de servidor'],400);
        }
       
        return $next($request);
    }
}
