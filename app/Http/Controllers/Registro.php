<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Usuarios;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


class Registro extends Controller
{

    //registrar acciones en historial
    public function regisHistorial(Request $request){    

        $user = $request->user();
        $datos = $request->datos;
        
        $registro = new Historial();
        $FK_id = $user -> REGISTRO_id;
        $nomUse = $user -> nomUsuario;
        $registro-> nomUsuario = $nomUse;
        $registro-> FK_id_usuario = $FK_id;
        $registro-> datos = $datos;
        $registro-> save();
        
        return response()->json(['success' => 1, 'message' =>  'historial guardado', 'id' => $registro -> REGISTRO_id]);
    }

    //Obtener historial
    public function getHistorial(Request $request){    

        $user = $request->user();
        $permiso = $user -> permiso;
        $nomUser = $user -> nomUsuario;
        
        $getHistorial = Historial::all();
        
        $getFromuser = Historial::where('nomUsuario', $nomUser)->get();
        $consul = $permiso === "Administrador"? $getHistorial:$getFromuser;

        return response()->json ($consul);
    }

     //Eliminar historial de usuario
    public function deleHistorial(Request $request, $id){   
        $user = $request-> user();
        $deleteH = Historial::find($id);

        $deleteH->delete();
        return response()->json(['success' => 1, 'message' => 'eliminacion del historial']);
    }

     //Generar pdf 
    public function getWord(Request $request, $id){   

        $obtPdf = Historial::find($id);
        $data = json_decode($obtPdf -> datos);
        $ruta =  generar_word($data, $id);

        return response()->download($ruta);
    }

    //Realizar cambios a la información almacenada en la columna datos
    public function updateHistorial(Request $request, $id){     
        $update = Historial::find($id);

        $update->datos = $request->datos;


        $update->save();
        return response()->json(['message' => 'PDF actualizado'],200);

        return response()->json(['message' => 'Firma encontrada'],$data);
    }
}


