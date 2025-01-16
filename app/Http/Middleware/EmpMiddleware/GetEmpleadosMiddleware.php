<?php

namespace App\Http\Middleware\EmpMiddleware;

use App\Models\Firmas;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetEmpleadosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $abogados = Firmas::where('cargo', 'Abogado Procurador')->get();
        if(!$abogados){
            return response()->json(['success' => 1, 'message' => 'abogados']);
        }
        return $next($request);
    }
}
