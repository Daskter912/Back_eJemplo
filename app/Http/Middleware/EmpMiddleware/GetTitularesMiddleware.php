<?php

namespace App\Http\Middleware\EmpMiddleware;

use App\Models\Firmas;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetTitularesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $titulares = Firmas::where('cargo', 'Titular de Jefatura')->get();
        if(!$titulares){
            return response()->json(['success', 'Titular de Jefatura'])->get();
        }
        return $next($request);
    }
}
