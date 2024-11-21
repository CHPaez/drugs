<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

/**
 * Trait para poder definir la estructura de los botones basado en los permisos del usuario
 * @author Sebastian Diaz <d12sebastian21@gmail.com>
 * @version 1.0.0
*/

trait BotonManager
{
    /** @var Array Botones disponibles para ser invocados */
    protected $botones = [
        'crear' => "<button type='%s' class='btn btn-primary float-right m-1 %s' id='%s' name='%s' %s>Crear</button>",
        'guardar' => "<button type='%s' class='btn btn-primary float-left %s' id='%s' name='%s' %s>Guardar</button>",
        'actualizar' => "<button type='%s' class='btn btn-outline-primary btn-sm %s' id='%s' name='%s' %s><i class='mdi mdi-check'></i></button>",
        'editar' => "<button type='%s' class='btn btn-outline-success btn-sm %s' id='%s' name='%s' %s><i class='far fa-edit'></i></button>",
        'configurar' => "<button type='%s' class='btn btn-outline-info btn-sm %s' id='%s' name='%s' %s><i class='fa fa-gears'></i></button>",
        'ejecutar' => "<button type='%s' class='btn btn-outline-info btn-sm %s' id='%s' name='%s' %s><i class='fa fa-play'></i></button>",
        'eliminar' => "<button type='%s' class='btn btn-outline-danger btn-sm %s' id='%s' name='%s' %s><i class='far fa-trash-alt'></i></button>",
    ];

    /** @var String Corresponde al enlace actual que el usuario esta consultando */
    private $uri;

    /** @var  Object Almacena la informacion del usuario logueado */
    private $usuario;
    
    /**
     * Obtiene los botones disponibles para el usuario logueado en funcion de la ruta solicitada
     * @param Object $usuario Informacion del usuario
     * @param Array $incluir Botones a incluir para la solicitud entrante
     * @param String $url enlace de la solicitud entrante
     * @return Array Botones disponibles 
     */
    public function incluirBotones(object $usuario,array $incluir, $request): Array
    {
        $this->usuario = $usuario;
       
        if (is_null($this->usuario)) {
            return [];
        }

        if (strpos($request->route()->getName(), '.index') === false) {
            $pathUri = explode('/', $request->path());
            $this->uri = $pathUri[0];
        }else{
            $this->uri = $request->path();
        }

        //Agrupa todos los botones en un solo indice
        $html = [
            'all' => ''
        ];

        //Genera el boton siempre y cuando el boton a incluir este dentro de los botones disponibles y el usuario tenga los permisos
        foreach ($incluir as $boton => $items) {
            $html[$boton] = "";

            if (array_key_exists($boton, $this->botones) && $this->validarPermisos($boton)){

                $type = $items[0] ?? $boton;
                $name = $items[1] ?? $boton;
                $id = $items[2] ?? $boton;
                $class = $items[3] ?? '';
                $attr = $items[4] ?? '';

                $html['all'] .= sprintf($this->botones[$boton],$type,$class,$id,$name,$attr);
                $html[$boton] .= sprintf($this->botones[$boton],$type,$class,$id,$name,$attr);
            }
        }

        return $html;
    }

    /**
     * Valida los permisos del usuario respecto a la accion solicitada
     * @param String $accion Accion a realizar
     * @return Bool Permiso sobre la accion solicitada
     */
    private function validarPermisos(string $accion): bool
    {
        $usuarioPermisos = DB::table('usuarios_roles as ur')
            ->leftJoin('roles_permisos as rp', 'rp.Roles_id', 'ur.Roles_id')
            ->leftJoin('modulos as m', 'm.id', 'rp.Modulos_id')
            ->leftJoin('routes as r', 'r.id', 'm.MoRoute')
            ->select('Read','Update', 'Delete', 'Create')
            ->where('ur.Users_id', $this->usuario->id)
            ->where('r.url', $this->uri)
            ->first();

        if (is_null($usuarioPermisos)) {
            return false;
        }

        return match ($accion) {
            'crear' => $usuarioPermisos->Create ?? false,
            'guardar' => $usuarioPermisos->Create ?? false,
            'actualizar' => $usuarioPermisos->Update ?? false,
            'editar' => $usuarioPermisos->Update ?? false,
            'configurar' => $usuarioPermisos->Update ?? false,
            'eliminar' => $usuarioPermisos->Delete ?? false,
            'ejecutar' => $usuarioPermisos->Read ?? false,
            default => false,
        };
    }
}
