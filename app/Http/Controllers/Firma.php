<?php

namespace App\Http\Controllers;

use App\Models\Firmas;
use Illuminate\Http\Request;

class Firma extends Controller
{
    //Obtener todas las firmas
    public function getFirma(){    

        $obtFirma = Firmas::all();
        
        return response()->json ($obtFirma);
    }

    //Agregar una nueva firma-Verificacion de existencia
    public function addFirma(Request $request){    
        $correo = $request->correo;

        $registro = new Firmas(); 
        $coreeoAdd = $correo . '@imss.gob.mx';

        $registro->nombre = $request->nombre;
        $registro->cargo = $request->cargo;
        $registro->matricula = $request->matricula;
        $registro->correo = $coreeoAdd;
        $registro->save();
        
        return response()->json(['message' => 'Se guardo satisfactoriamente '], 200);
    }

    //Actualizar una firma existente    
    public function updateFirma(Request $request, $id){    
        $update = Firmas::find($id);
    
        $correo = $request->correo;

        if(Firmas::where('correo', $correo)->exists()){
            $update->correo = $correo;
        }else{
            $update->correo = $correo.'@imss.gob.';
        }

        $update->nombre = $request->nombre;
        $update->cargo = $request -> cargo;
        $update->matricula = $request -> matricula;

        $update->save();
        return response()->json(['message' => 'Firma encontrada'],200);
    }

    //Eliminar firma
    public function deleFirma($id){   

        $deleteF = Firmas::find($id);
        
        $deleteF->delete();
        return response()->json(['message' => 'Firma deleted successfully'], 200);
    }
}
