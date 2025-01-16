<?php

namespace App\Http\Middleware\FirmMiddleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Firmas;


class DeleteFirmaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $deleteF = Firmas::find($request -> route('id'));
        if(!$deleteF){
            return response()->json(['message' => 'Id no encontrada'],400);
        }
        return $next($request);
    }
}
