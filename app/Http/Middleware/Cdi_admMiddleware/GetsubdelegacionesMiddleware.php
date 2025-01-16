<?php

namespace App\Http\Middleware\Cdi_admMiddleware;

use App\Models\Cdi_admon_Unidades;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetsubdelegacionesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $getSubedel = Cdi_admon_Unidades::where('FKid_tipoUnidad', '11')->get();

        if(!$getSubedel){
            return response()->json(['success' => 1, 'message' => 'Error fetching data from database']);
        }

        return $next($request);
    }
}
