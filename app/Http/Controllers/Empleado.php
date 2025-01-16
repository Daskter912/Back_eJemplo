<?php

namespace App\Http\Controllers;

use App\Models\Firmas;
use Illuminate\Http\Request;

class Empleado extends Controller
{
     //Obtener los abogados
    public function getAbog(){   
        $abogados = Firmas::where('cargo', 'Abogado Procurador')->get();

        return response()->json($abogados);
    }

    //Obtener los jefes de oficina
    public function getJefeof(){    
        $jefeOfi = Firmas::where('cargo', 'Jefe de Oficina')->get();
        
        return response()->json($jefeOfi);
    }

    //Obtener los jefes de departamento
    public function getJefedep(){    
        $jefeDepa = Firmas::where('cargo', 'Jefe de Departamento')->get();
        
        return response()->json($jefeDepa);
    }

    //Obtener los titulares
    public function getTitulares(){   
        $titulares = Firmas::where('cargo', 'Titular de Jefatura')->get();
        if(!$titulares){
            return response()->json(['success', 'Titular de Jefatura'])->get();
        }
        return response()->json($titulares);
    }
}
