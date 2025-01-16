<?php

namespace App\Http\Middleware\EmpMiddleware;

use App\Models\Firmas;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetJefeDepMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $jefeDepa = Firmas::where('cargo', 'Jefe de Departamento')->get();
        if(!$jefeDepa){
            return response()->json(['success' => 1, 'message' => 'Jefe de departamento']);
        }
        return $next($request);
    }
}
