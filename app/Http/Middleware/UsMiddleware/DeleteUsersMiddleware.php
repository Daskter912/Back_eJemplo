<?php

namespace App\Http\Middleware\UsMiddleware;

use App\Models\Usuarios;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $deleteU= Usuarios::find($request -> route('id'));

        if(!$deleteU){
            return response()->json(['message' => 'Id no encontrada'],400);
        }

        return $next($request);
    }
}
