<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('personas', App\Http\Controllers\API\personasAPIController::class);


Route::resource('tiposasociados', App\Http\Controllers\API\tiposasociadosAPIController::class);


Route::resource('tiposidentificaciones', App\Http\Controllers\API\tiposidentificacionesAPIController::class);


Route::resource('generos', App\Http\Controllers\API\generoAPIController::class);


Route::resource('asociados', App\Http\Controllers\API\asociadosAPIController::class);


Route::resource('estadospersonas', App\Http\Controllers\API\EstadosPersonasAPIController::class);


Route::resource('droguerias_personas', App\Http\Controllers\API\droguerias_personasAPIController::class);


Route::resource('drogueriaspersonas', App\Http\Controllers\API\drogueriaspersonasAPIController::class);


Route::resource('paises', App\Http\Controllers\API\paisesAPIController::class);


Route::resource('departamentos', App\Http\Controllers\API\departamentosAPIController::class);


Route::resource('ciudades', App\Http\Controllers\API\ciudadesAPIController::class);


Route::resource('historialllamadas', App\Http\Controllers\API\historialllamadasAPIController::class);


Route::resource('indicativosciudades', App\Http\Controllers\API\indicativosciudadesAPIController::class);


Route::resource('tipostelefonos', App\Http\Controllers\API\tipostelefonosAPIController::class);


Route::resource('telefonopersonas', App\Http\Controllers\API\telefonopersonasAPIController::class);


Route::resource('tipificacion_llamadas', App\Http\Controllers\API\TipificacionLlamadasAPIController::class);


Route::resource('tipificacionllamadas', App\Http\Controllers\API\tipificacionllamadasAPIController::class);


Route::resource('tiposdroguerias', App\Http\Controllers\API\tiposdrogueriasAPIController::class);


Route::resource('droguerias', App\Http\Controllers\API\drogueriasAPIController::class);
