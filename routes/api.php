<?php

use App\Http\Controllers\cdi_admon;
use App\Http\Controllers\DocWord;
use App\Http\Controllers\Empleado;
use App\Http\Controllers\Firma;
use App\Http\Controllers\Registro;
use App\Http\Controllers\Usuario;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EmpMiddleware\GetEmpleadosMiddleware;
use App\Http\Middleware\EmpMiddleware\GetJefeDepMiddleware;
use App\Http\Middleware\EmpMiddleware\GetJefeOFMiddleware;
use App\Http\Middleware\EmpMiddleware\GetTitularesMiddleware;
use App\Http\Middleware\FirmMiddleware\AddFirmaMiddleware;
use App\Http\Middleware\FirmMiddleware\DeleteFirmaMiddleware;
use App\Http\Middleware\FirmMiddleware\GetFirmaMiddleware;
use App\Http\Middleware\FirmMiddleware\UpdateFirmaMiddleware;
use App\Http\Middleware\RegMiddleware\DeleteHistotialMiddleware;
use App\Http\Middleware\UsMiddleware\CreateUsersMiddleware;
use App\Http\Middleware\UsMiddleware\DeleteUsersMiddleware;
use App\Http\Middleware\UsMiddleware\GetUsersMiddleware;
use App\Http\Middleware\UsMiddleware\UpdateUsersMiddleware;
use App\Http\Middleware\Cdi_admMiddleware\GetooadsMiddleware;
use App\Http\Middleware\Cdi_admMiddleware\GetsubdelegacionesMiddleware;
use App\Http\Middleware\Cdi_admMiddleware\GetumfsMiddleware;
use App\Models\Usuarios;

use function Ramsey\Uuid\v1;

Route::get('v1/iniciar', function(){

        // TODO : Si ya existe el usuario administrador y el healthcheck, que esta ruta no haga ndad
        $clave = 1234;
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $registro = new Usuarios();
        $registro-> nomUsuario = 'root';
        $registro-> matricula = 'root';
        $registro-> clave = $hash;
        $registro-> permiso = 'Administrador';
        $registro->save();

        $clave = 'He01th1';
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $registro = new Usuarios();
        $registro-> nomUsuario = 'healthcheck';
        $registro-> matricula = 'healthcheck';
        $registro-> clave = $hash;
        $registro-> permiso = 'Sin permiso';
        $registro->save();
        return response()->json(['message' => 'Sistema inicializado correctamente XD']);
});

Route::controller(Usuario::class)->group(function(){

    //Validar la sesión 
    Route::post("v1/login", 'auth');

    //Cerrar sesión
    Route::get('v1/cerrar', 'cloeseSesion')->middleware(['auth:sanctum']);
    
    //Obtener todos los usuarios 
    Route::get('v1/usuarios', 'getUsers')->middleware(['auth:sanctum', GetUsersMiddleware::class]);

    //Obtener los permisos
    Route::get('v1/permisos', 'getPermisos')->middleware(['auth:sanctum']);
    
    // //Editar usuario
    Route::put('v1/usuarios/{id}', 'editUser')->middleware(['auth:sanctum', UpdateUsersMiddleware::class]);
    
    // //Eliminar usuario
    Route::delete('v1/users/{id}', 'deleUser')->middleware(['auth:sanctum', DeleteUsersMiddleware::class]);
    
    // //Crear usuario
    Route::post('v1/users', 'creatUser')->middleware(['auth:sanctum', CreateUsersMiddleware::class]);
});

Route::controller(Empleado::class)->group(function(){

    //Obtener los abogados
    Route::get('v1/abogados', 'getAbog')->middleware(['auth:sanctum', GetEmpleadosMiddleware::class]);

    //Obtener los jefes de oficina
    Route::get('v1/jefeof', 'getJefeof')->middleware(['auth:sanctum', GetJefeOFMiddleware::class]);

    //Obtener los jefes de departamento
    Route::get('v1/jefedep', 'getJefedep')->middleware(['auth:sanctum', GetJefeDepMiddleware::class]);

    //Obtener los titulares
    Route::get('v1/titulares', 'getTitulares')->middleware(['auth:sanctum', GetTitularesMiddleware::class]);
});

Route::controller(Firma::class)->group(function(){

    //Obtener todas las firmas
    Route::get('v1/firmas', 'getFirma')->middleware(['auth:sanctum', GetFirmaMiddleware::class]);

    //Agregar una nueva firma-Verificacion de existencia
    Route::post('v1/firmas', 'addFirma')->middleware(['auth:sanctum', AddFirmaMiddleware::class]);

    //Actualizar una firma existente
    Route::put('v1/firmas/{id}', 'updateFirma')->middleware(['auth:sanctum', UpdateFirmaMiddleware::class]);

    //Eliminar firma
    Route::delete('v1/firmas/{id}', 'deleFirma')->middleware(['auth:sanctum', DeleteFirmaMiddleware::class]);
});

Route::controller(Registro::class)->group(function(){

    //Ruta para registrar acciones en historial
    Route::post('v1/historial', 'regisHistorial')->middleware(['auth:sanctum']);

    //Obtener historial
    Route::get('v1/historial', 'getHistorial')->middleware(['auth:sanctum']);
    
    //Eliminar historial de usuario
    Route::delete('v1/historial/{id}', 'deleHistorial')->middleware(['auth:sanctum', DeleteHistotialMiddleware::class]);

    //Generar word
    Route::get('v1/word/{id}', 'getWord')->middleware(['auth:sanctum']);


    //Realizar cambios a la información almacenada en la columna datos
    Route::put('v1/upHistorial/{id}', 'updateHistorial') ->middleware(['auth:sanctum']);
});

Route::controller(cdi_admon::class)->group(function(){

    //Obtener las subdelegacion 
    Route::get('v1/subdelegaciones', 'getSubdelegaciones')->middleware(['auth:sanctum']);

    //Obtener las unidades Umfs
    Route::get('v1/unidades', 'getUmfs')->middleware(['auth:sanctum']);
});

Route::controller(Cdi_admon::class)->group(function(){
    
    //Obtener las ooads del estado
    Route::get('v1/ooads', 'getOoads')->middleware(['auth:sanctum']);
});

