<?php

namespace App\Http\Middleware\Cdi_admMiddleware;

use App\Models\Cdi_admon_Unidades;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetumfsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $getUmfs = Cdi_admon_Unidades::where('FK_id_tipo_unidad_circular', '2')->get();

        if(!$getUmfs){
            return response()->json(['success' => 1, 'message' => 'Error fetching data from database']);
        }
        return $next($request);
    }
}
