<?php

use Illuminate\Support\Facades\Route;
Auth::routes();



    Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //Personas
    Route::resource('personas', App\Http\Controllers\Personas\personasController::class);
    Route::resource('generos', App\Http\Controllers\Personas\generoController::class);
    Route::resource('estadosPersonas', App\Http\Controllers\Personas\EstadosPersonasController::class);
    Route::resource('tiposidentificaciones', App\Http\Controllers\Personas\tiposidentificacionesController::class);
    Route::resource('estadospersonas', App\Http\Controllers\Personas\estadospersonasController::class);

    //Asociados
    Route::resource('asociados', App\Http\Controllers\Asociados\asociadosController::class);
    Route::resource('tiposasociados', App\Http\Controllers\Asociados\tiposasociadosController::class);

    //Droguerias
    Route::resource('tiposdroguerias', App\Http\Controllers\Droguerias\tiposdrogueriasController::class);
    Route::resource('droguerias', App\Http\Controllers\Droguerias\drogueriasController::class);
    Route::resource('drogueriaspersonas', App\Http\Controllers\Droguerias\drogueriaspersonasController::class);

    //Paises
    Route::resource('paises', App\Http\Controllers\Paises\paisesController::class);
    Route::resource('departamentos', App\Http\Controllers\Paises\departamentosController::class);
    Route::resource('ciudades', App\Http\Controllers\Paises\ciudadesController::class);
    Route::resource('indicativosciudades', App\Http\Controllers\Paises\indicativosciudadesController::class);


    //Llamadas
    Route::resource('historialllamadas', App\Http\Controllers\Llamadas\historialllamadasController::class);
    Route::resource('tipostelefonos', App\Http\Controllers\Llamadas\tipostelefonosController::class);
    //Route::resource('telefonopersonas', App\Http\Controllers\Llamadas\telefonopersonasController::class);
    Route::resource('tipificacionLlamadas', App\Http\Controllers\Llamadas\TipificacionLlamadasController::class);

    //Administracion
    Route::resource('Administracion', App\Http\Controllers\Administracion\AdministradorController::class);
    Route::resource('Modulos', App\Http\Controllers\Administracion\ModulosController::class);

}
);