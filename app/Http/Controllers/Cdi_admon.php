<?php

namespace App\Http\Controllers;


use App\Models\Delegaciones;
use App\Models\Subdelegaciones;
use App\Models\Umf;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class Cdi_admon extends Controller
{
        //Obtener las ooads del estado
        public function getOoads(Request $request){    
            $getOoads = Delegaciones::all();

                return response()->json ($getOoads);
        }

        //Obtener las subdelegacion 
        public function getSubdelegaciones(Request $request){
            $getSubedel = Subdelegaciones::all();

                return response()->json($getSubedel);
        }

        //Obtener las unidades Umfs
        public function getUmfs(Request $request){    
            $getUmf = Umf::all();

                return response()->json($getUmf);
        }
}


