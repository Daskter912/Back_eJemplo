<?php

namespace App\Http\Middleware\Cdi_admMiddleware;

use App\Models\Cdi_admon_Ooads;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetooadsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $getOoads = Cdi_admon_Ooads::whereIN('id_region', ['1','2', '3', '4'])->get();

        if(!$getOoads){
            return response()->json(['success' => 1, 'message' => 'Error fetching data from database']);
        }

        return $next($request);
    }
}
