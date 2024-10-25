<?php 
namespace App\Traits;

use App\Http\Controllers\Administracion\AdministradorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Trait para poder definir la estructura del menu de navegacion basado en los permisos
 * @author Sebastian Diaz <d12sebastian21@gmail.com>
 * @version 1.0.0
 */

trait MenuManager
{
    /**
     * @var Array $OpcionesMenu Menús disponibles para incluir en la barra de navegación según el usuario logueado.
    *
    * Define la estructura del menú en función de los permisos y rol del usuario logueado.
    * Cada entrada del menú está organizada por módulos y submódulos, con sus enlaces y opciones asociadas.
    *
    * @example
    * $OpcionesMenu = [
    *     "nombre_modulo" => [
    *         "links" => [
    *             "nombre_submodulo" => "nombre_ruta", // Ruta asociada al submódulo
    *         ],
    *         "opciones" => [
    *             "alias" => "Alias del submódulo", // Alias que se mostrará en el menu
    *             "id" => "id_enlace", // id único del enlace
    *             "icon" => "icono_modulo" // Icono asociado al módulo para visualizarlo en el menu
    *         ]
    *     ]
    * ];
    *
    * Las claves del array representan los nombres de los módulos y submódulos, y cada uno puede contener
    * múltiples enlaces y opciones adicionales según se requiera.
    *
    * @note Asegúrate de que los nombres de los módulos y submódulos sean únicos dentro de la estructura
    *       para evitar conflictos en la navegación.
    */
    private $OpcionesMenu = [ 
        "Administracion de usuarios" => [
            "links" => [
                "Usuarios" => "Administracion.index",
                "Roles de usuario" => "roles.usuarios.index"
            ],
            "opciones" => [
                "alias" => "Admin. usuarios",
                "id" => "AdminUser",
                'icon' => "mdi mdi-crosshairs-gps menu-icon"
            ]
            ],
        "Configuracion" => [
            "links" => [
                "Crear roles" => "Roles.index",
                "Administrar modulos" => "Modulos.index",
            ],
            "opciones" => [
                "id" => "Configuracion",
                'icon' => "mdi mdi-crosshairs-gps menu-icon"
            ]
            ],
        "Llamadas" => [
            "links" => [
                'Tipificacion de llamadas' => 'tipificacionllamadas.index',
                'Inscritos' => 'inscritos.index',
                'Programas' => 'programas.index',
                'Tipos de telefono' => 'tipostelefonos.index',
                'Estados tipificacion' => 'estadostipificacions.index',
                'Causales tipificacion' => 'causales.index',
                'Modalidades' => 'modalidades.index',
                'Horarios' => 'horarios.index',
                'Datos adicionales' => 'datosadicionales.index'
            ],
            "opciones" => [
                "id" => "Llamadas",
                'icon' => "mdi mdi-crosshairs-gps menu-icon"
            ]
            ],
        "Paises" => [
            "links" => [
                'Paises' => 'paises.index',
                'Departamentos'=> 'departamentos.index',
                'Ciudades' => 'ciudades.index',
                'Indicativos de ciudades' => 'indicativosciudades.index',
            ],
            "opciones" => [
                "id" => "Paises",
                'icon' => "mdi mdi-crosshairs-gps menu-icon"
            ]
            ],
        "Asociados" => [
            "links" => [
                'Tipos de asociados' => 'tiposasociados.index',
                'Asociados' => 'asociados.index',
            ],
            "opciones" => [
                "id" => "Asociados",
                'icon' => "mdi mdi-crosshairs-gps menu-icon"
            ]
            ],
        "Droguerias" => [
            "links" => [
                'Tipos de droguerias' => 'tiposdroguerias.index',
                'Droguerias' => 'droguerias.index',
                'Drogueriaspersonas' => 'drogueriaspersonas.index',
            ],
            "opciones" => [
                "id" => "Droguerias",
                'icon' => "mdi mdi-crosshairs-gps menu-icon"
            ]
            ],
        "Personas" => [
            "links" => [
                'Personas' => 'personas.index',
                'Tipos de identificaciones' => 'tiposidentificaciones.index',
                'Generos' => 'generos.index',
                'Estados Personas' => 'estadospersonas.index',
                'Telefono de personas' => 'telefonopersonas.index',
            ],
            "opciones" => [
                "id" => "Personas",
                'icon' => "mdi mdi-crosshairs-gps menu-icon"
            ]
            ],
        

    ];

    /** @var Collection Contiene los modulos y submodulos disponibles para el usuario logueado*/
    private $habilitar_submodulos;

    /**
     * Inicializa los valores necesarios para obtener el menu
     * @return this
     */
    public function init():Object {
       $this->habilitar_submodulos = AdministradorController::obtenerPermisosUsuario();
       return $this;
    }

    /** 
    * Obtiene el menu generado
    */
    public function get_links(){
        return $this->habilitar_submodulos->isEmpty() ? '' : $this->match_links();
    }

    /**
     * Serializa y genera los modulos disponibles para el usuario
     * @return String Menu disponible
     */
    public function match_links():string {
        $match = [];
        foreach ($this->habilitar_submodulos->all() as $key) {
            $match[$key->MoNombre][] = $key->MoSubmodulo;
        }
        return $this->get_html($match);
    }

    /**
     * Genera la estructura para el modulo indicado siempre y cuando este presente en $OpcionesMenu 
     * @param Array $modulo Modulos a generar
     * @return String Menu disponible
     */
    public function get_html(Array $modulo):string {
        $html = "";

        foreach ($modulo as $NombreModulo => $submodulo) {
            if(array_key_exists($NombreModulo, $this->OpcionesMenu)){
                $id_html = $this->OpcionesMenu[$NombreModulo]["opciones"]["id"];
                $icon = $this->OpcionesMenu[$NombreModulo]["opciones"]["icon"];
                $links =  $this->dibujar_links($submodulo,$NombreModulo);
                $NombreModulo = $this->OpcionesMenu[$NombreModulo]["opciones"]["alias"] ?? $NombreModulo;

                $html .= "<li class='nav-item'>
                <a class='nav-link' data-bs-toggle='collapse' href='#{$id_html}' aria-expanded='false' aria-controls='ui-basic'>
                    <span class='menu-title'>{$NombreModulo}</span>
                    <i class='menu-arrow'></i>
                    <i class='{$icon}'></i>
                </a>
                <div class='collapse' id='{$id_html}'>
                    <ul class='nav flex-column sub-menu'>
                        {$links}
                    </ul>
                </div>
            </li>";

            }
        }

        return $html;
    }

    /**
     * Dibuja los enlaces (submodulos) para el modulo indicado
     * @param Array $submodulo Submodulos disponibles para el modulo
     * @param String $modulos Nombre del modulo a dibujar
     * @return String Submodulos disponibles
     */
    public function dibujar_links(Array $submodulo,string $modulo):string {
        $links = "";
        foreach($submodulo as $sub){
            $ruta = $this->OpcionesMenu[$modulo]["links"][$sub] ?? 'home';
            $ruta = route($ruta);
            $links .=  "<li class='nav-item'> <a class='nav-link' href='{$ruta}'>{$sub}</a></li>";
        }
    
        return $links;
    }

}
?>