<?php

namespace App\Http\Middleware\FirmMiddleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Firmas;

class UpdateFirmaMiddleware
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

        $update = Firmas::find($request -> route('id'));
        if(!$update){
            return response()->json(['message' => 'Firma no encontrada'],400);
        }
        return $next($request);

    }
}
