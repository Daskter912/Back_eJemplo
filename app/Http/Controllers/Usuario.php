<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class Usuario extends Controller
{
    //Validar la sesión
    public function auth(Request $request){     

        $request->validate([
            'matricula' => 'required|string',
            'clave'  =>  'required|string'
        ]);

        $matricula = $request->matricula;
        $clave = $request->clave;

        $user = Usuarios::where('matricula', $matricula )->first();

        if(!Usuarios::where('matricula', $matricula)->exists()){
            return response()->json(['message' => 'El usuario no se encuentra'],401);
        }
        $usuario = Usuarios::where('matricula', $matricula)->first();


        if(!password_verify($clave, $user->clave )){
            return response()->json(['message' => 'Password son incorrectos'],401);
        }

        return response()->json([
            'success' => 1, 
            'message' => 'Funciona login', 
            'userName' => $usuario -> nomUsuario,
            'token' => $usuario->createToken($usuario->REGISTRO_id)->plainTextToken
        ]);
        }

    //Cerrar sesión
    public function cloeseSesion(Request $request){    
            $request -> user()->currentAccessToken()->delete();
    
            return response()->json (['message' => 'se ha cerrado sesion correctamente'],200);
        }
    
    public function getPermisos(Request $request){    //Obtener los permisos
        $user = $request->user();
        $privilegios = $user -> permiso;

        return response()->json ($privilegios);
    }

     //Obtener todos los usuarios
    public function getUsers(){    
        $usuario = Usuarios::all();

        return response()->json ($usuario);
    }

    //Editar usuario
    public function editUser(Request $request, $id){    
        $update = Usuarios::find($id);

        $update->nomUsuario =$request -> nomUsuario;
        $update->matricula =$request -> matricula;
        $update->clave =$request -> clave;
        $update->permiso =$request -> permiso;
        $update->save();

        return response()->json(['message' => 'Actualización realizada satisfactoriamente', 'user' => 'error de servidor ']);
    }

    //Eliminar usuario
    public function deleUser($id){    
        $deleteU= Usuarios::find($id);

        $deleteU->delete();
        return response()->json(['success' => 1, 'message' => 'Usuario eliminado satisfactoriamente', 'users' => 'Eliminar usuario, error']);
    }

    //Crear usuario
    public function creatUser(Request $request){   
        $clave = $request -> clave;
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        
        $registro = new Usuarios();
        $registro-> nomUsuario = $request -> nomUsuario;
        $registro-> matricula = $request -> matricula;
        $registro-> clave = $hash;
        $registro-> permiso = $request -> permiso;
        $registro->save();

        return response()->json(['message' => 'Usuario creado satisfactoriamente', 'users' => 'crear usu']);
    }
}
