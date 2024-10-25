<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Administracion\RolesController;
use App\Http\Controllers\Administracion\ModulosController;

    Auth::routes();

    Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //Personas
    route::module('Personas',function(){
        Route::submodule('Personas',function (){
            Route::resource('personas', App\Http\Controllers\Personas\personasController::class);
        });
        Route::submodule('Generos',function (){
            Route::resource('generos', App\Http\Controllers\Personas\generoController ::class);
        });
        Route::submodule('Tipos de identificaciones',function (){
            Route::resource('tiposidentificaciones', App\Http\Controllers\Personas\tiposidentificacionesController::class);
        });
        Route::submodule('Estadospersonas',function (){
            Route::resource('estadospersonas', App\Http\Controllers\Personas\estadospersonasController::class);
        });
        Route::submodule('Telefonopersonas',function (){
            Route::resource('telefonopersonas', App\Http\Controllers\Personas\telefonopersonasController::class);
        });
    });

    //Asociados
    route::module('Asociados',function(){
        Route::submodule('Asociados',function (){
            Route::resource('asociados', App\Http\Controllers\Asociados\asociadosController::class);
        });
        Route::submodule('Tipos de asociados',function (){
            Route::resource('tiposasociados', App\Http\Controllers\Asociados\tiposasociadosController::class);
        });
    });

    //Droguerias
    route::module('Droguerias',function(){
        Route::submodule('Tipos de droguerias',function (){
            Route::resource('tiposdroguerias', App\Http\Controllers\Droguerias\tiposdrogueriasController::class);
        });
        Route::submodule('Droguerias',function (){
            Route::resource('droguerias', App\Http\Controllers\Droguerias\drogueriasController::class);
        });
        Route::submodule('Drogueriaspersonas',function (){
            Route::resource('drogueriaspersonas', App\Http\Controllers\Droguerias\drogueriaspersonasController::class);
        });
    });

    //Paises
    route::module('Paises',function(){
        Route::submodule('Paises',function (){
            Route::resource('paises', App\Http\Controllers\Paises\paisesController::class);
        });
        Route::submodule('Departamentos',function(){
            Route::resource('departamentos', App\Http\Controllers\Paises\departamentosController::class);
        });
        Route::submodule('Ciudades',function(){
            Route::resource('ciudades', App\Http\Controllers\Paises\ciudadesController::class);
        });
        Route::submodule('Indicativos de ciudades',function(){
            Route::resource('indicativosciudades', App\Http\Controllers\Paises\indicativosciudadesController::class);
        });
    });

    //Llamadas
    Route::module('Llamadas', function () {
        route::submodule('Tipos de telefono',function(){
            Route::resource('tipostelefonos', App\Http\Controllers\Llamadas\tipostelefonosController::class);
        });
        route::submodule('Tipificacion de llamadas',function(){
            Route::resource('tipificacionllamadas', App\Http\Controllers\Llamadas\tipificacionllamadasController::class);
        });
        route::submodule('Programas',function(){
            Route::resource('programas', App\Http\Controllers\Llamadas\programasController::class);
        });
        route::submodule('Estados tipificacion',function(){
            Route::resource('estadostipificacions', App\Http\Controllers\Llamadas\estadostipificacionController::class);
        });
        route::submodule('Causales tipificacion',function(){
            Route::resource('causales', App\Http\Controllers\Llamadas\causalesController::class);
        });
        route::submodule('Horarios',function(){
            Route::resource('horarios', App\Http\Controllers\Llamadas\horariosController::class);
        });
        route::submodule('Modalidades',function(){
            Route::resource('modalidades', App\Http\Controllers\Llamadas\modalidadesController::class);
        });
        route::submodule('Datos adicionales',function(){
            Route::resource('datosadicionales', App\Http\Controllers\Llamadas\datosadicionalesController::class);
        });
        route::submodule('Inscritos',function(){
            Route::resource('inscritos', App\Http\Controllers\Llamadas\inscritosController::class);
        });
    });


    //Administracion de usuarios
    Route::module('Administracion de usuarios', function () {
        Route::submodule('Usuarios', function () {
            Route::resource('Administracion', App\Http\Controllers\Administracion\AdministradorController::class);
        });
    
        Route::submodule('Roles de usuario', function () {
            Route::get('roles_usuarios', [RolesController::class, 'rolesUsuario'])->name('roles.usuarios.index');
            Route::post('roles_usuarios', [RolesController::class, 'guardarRoles_Usuarios'])->name('user.roles.store');
            Route::patch('roles_usuarios', [RolesController::class, 'actualizarRoles_Usuarios'])->name('user.roles.update');
            Route::delete('roles_usuarios', [RolesController::class, 'eliminarRoles_Usuarios'])->name('user.roles.delete');
            Route::post('roles/selectores', [RolesController::class, 'selectores'])->name('roles.selectores');
        });
    });

    //Configuracion del sistema
    Route::module('Configuracion', function(){
        route::submodule('Crear roles',function(){
            Route::get('Roles', [RolesController::class, 'index'])->name('Roles.index');
            Route::post('Roles', [RolesController::class, 'store'])->name('Roles.store');
            Route::patch('Roles', [RolesController::class, 'update'])->name('Roles.update');
            Route::delete('Roles', [RolesController::class, 'destroy'])->name('Roles.delete');
            //Route::resource('Roles', App\Http\Controllers\Administracion\RolesController::class);
           
        });
        route::submodule('Administrar modulos',function(){
            Route::get('Modulos', [ModulosController::class, 'index'])->name('Modulos.index');
            Route::get('Modulos/{Modulo}', [ModulosController::class, 'show'])->name("Modulos.show");
            Route::post('Modulos', [ModulosController::class, 'store'])->name("Modulos.store");
            Route::patch('Modulos', [ModulosController::class, 'update'])->name("Modulos.update");
            Route::delete('Modulos', [ModulosController::class, 'delete'])->name("Modulos.delete");
        });    
    });
}
);








