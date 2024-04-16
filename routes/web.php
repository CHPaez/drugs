<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('personas', App\Http\Controllers\personasController::class)->middleware('auth');


Route::resource('tiposasociados', App\Http\Controllers\tiposasociadosController::class)->middleware('auth');


Route::resource('tiposidentificaciones', App\Http\Controllers\tiposidentificacionesController::class)->middleware('auth');


Route::resource('generos', App\Http\Controllers\generoController::class)->middleware('auth');


Route::resource('asociados', App\Http\Controllers\asociadosController::class)->middleware('auth');


Route::resource('estadosPersonas', App\Http\Controllers\EstadosPersonasController::class);


Route::resource('estadospersonas', App\Http\Controllers\estadospersonasController::class);


Route::resource('drogueriasPersonas', App\Http\Controllers\droguerias_personasController::class);


Route::resource('drogueriaspersonas', App\Http\Controllers\drogueriaspersonasController::class);


Route::resource('paises', App\Http\Controllers\paisesController::class);


Route::resource('departamentos', App\Http\Controllers\departamentosController::class);


Route::resource('ciudades', App\Http\Controllers\ciudadesController::class);


Route::resource('historialllamadas', App\Http\Controllers\historialllamadasController::class);


Route::resource('indicativosciudades', App\Http\Controllers\indicativosciudadesController::class);


Route::resource('tipostelefonos', App\Http\Controllers\tipostelefonosController::class);


Route::resource('telefonopersonas', App\Http\Controllers\telefonopersonasController::class);


Route::resource('tipificacionLlamadas', App\Http\Controllers\TipificacionLlamadasController::class);


Route::resource('tipificacionLlamadas', App\Http\Controllers\TipificacionLlamadasController::class);


Route::resource('tipificacionllamadas', App\Http\Controllers\tipificacionllamadasController::class);


Route::resource('tiposdroguerias', App\Http\Controllers\tiposdrogueriasController::class);


Route::resource('droguerias', App\Http\Controllers\drogueriasController::class);
