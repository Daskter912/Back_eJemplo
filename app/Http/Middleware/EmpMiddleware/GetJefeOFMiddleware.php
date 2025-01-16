<?php

namespace App\Http\Middleware\EmpMiddleware;

use App\Models\Firmas;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetJefeOFMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $jefeOfi = Firmas::where('cargo', 'Jefe de Oficina')->get();
        if(!$jefeOfi){
            return response()->json(['success' => 1, 'message' => 'Jefe de oficina']);
        }
        return $next($request);
    }
}
