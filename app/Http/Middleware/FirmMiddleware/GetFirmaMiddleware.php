<?php

namespace App\Http\Middleware\FirmMiddleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Firmas;


class GetFirmaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $obtFirma = Firmas::all();
        if(!$obtFirma){
            return response()->json(['success' => 1, 'message' => 'Error fetching data from database']);
        }

        return $next($request);
    }
}
