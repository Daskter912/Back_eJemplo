<?php

namespace App\Http\Middleware\UsMiddleware;

use App\Models\Usuarios;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $usuario = Usuarios::all();

        if(!$usuario){
            return response()->json(['success' => 1, 'message' => 'Error fetching data from database']);
        }
        return $next($request);
    }
}
