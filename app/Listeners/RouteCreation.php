<?php

namespace App\Listeners;

use Illuminate\Routing\Events\RouteMatched;
use App\Models\Administracion\Modulos;
use App\Models\Administracion\routes;

/**
 * Administra y gestiona las solicitudes http entrantes de manera dinamica para poder modalizar un sistema
 * @author Sebastian Diaz <d12sebastian21@gmail.com>
 * @version 1.0.0
 */

class RouteCreation
{

    /**
     * Obtiene la solicitud entrante
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RouteMatched $event)
    {
        // Obtenemos la ruta registrada y dividimos la URI en partes, donde el primer indice correspondera al nombre del modulo
        $ruta = explode('/', $event->route->uri());
        $rutas['modulo'] = $event->route->action['module'] ?? $ruta[0];
        $rutas['submodulo'] = $event->route->action['submodule'] ?? (isset($ruta[1]) ? $ruta[1] : $ruta[0]); //Agrega el nombre del modulo si no hay un submodulo definido para la ruta

    
        // Obtenemos los métodos HTTP de la solicitud entrante
        $methods = implode('|', $event->route->methods());
    
        // Obtener el alias de la ruta
        $alias = $event->route->getName();

        // Si la ruta tuvo alguna modificacion se crear y/o almacena segun el caso.
        $route = routes::updateOrCreate(
            ['url' => $event->route->uri(), 'method' => $methods], // Condicion de la query
            [
                'url' => $event->route->uri(), // Valores a insertar o actualizar
                'method' => $methods,
                'alias' => $alias // Guardamos el alias de la ruta
            ]
        );

        //Se crean unicamente modulos el cual tenga una vista asignada
        if($methods == 'GET|HEAD' && strpos($alias,'.index')){
            Modulos::firstOrCreate(
                [
                    'MoRoute' => $route->id,
                    'MoNombre' => $rutas['modulo'],
                    'MoSubmodulo' => $rutas['submodulo'],
                ]
            );
        }
    }
    
}
