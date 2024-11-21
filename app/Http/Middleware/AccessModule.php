<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use stdClass;
use Illuminate\Support\Facades\URL;

class AccessModule
{
    /**
     * @var StdClass informacion del usuario logeado
     */
    private $usuario;

    /** @var SdtClass informacion del rol asignado al usuario logueado */
    private $rol_usuario;

    /** @var Array urls que no se tomaran en cuenta para el control */
    private const EXCEPTIONS = [
        '/',
        'Modulos/GET',
        'roles/selectores',
    ];

    /** @var Array accion asociada al metodo entrante */
    private $match = [
        'STORE' => "insert",
        "SHOW" => 'show',
        "EDIT" => 'show',
        "CREATE" => 'show',
        'INDEX' => 'show',
        'UPDATE' => 'update',
        'DELETE' => 'delete',
        "DESTROY" => 'delete'
    ];

    /** @var Array Mensaje que se estara mostrando al usuario en caso de no cumplir las validaciones */
    private $mensajes = [
        "AM-0001" => "<strong>Código: AM-0001</strong> | Su rol no puede acceder al modulo solicitado, si no tiene uno asignado, por favor comuniquese con la persona encargada para que le asigne uno",
        "AM-0002" => '<strong>Código: AM-0002</strong> | Su usuario no tiene permisos para acceder al modulo y/o realizar la accion solicitada.',
        "AM-0003" => "<strong>Código: AM-0003</strong> | Accion no permitida"
    ];

    /** @var string Redireccion por defecto en caso de no cumplir las validaciones */
    private $redirected_to = "/";

    /**
     * Funcion principal, el cual recibe y procesa la solicitud entrante, dependiendo de la url y los permisos que el 
     * usuario tenga sobre este permitira procesar la solicitud o no.
     */
    public function handle(Request $request, Closure $next)
    {
        $this->usuario = $request->user();
        $pathUri = $request->path();
        $accion_realizar = explode(".",$request->route()->getName()); //Divide el name de la ruta
        $Accion =  strtoupper(end($accion_realizar)); //Obtiene el ultimo elemento y lo parsea

        if (!$this->usuario) {
            return redirect('/login');
        }
        //dd($pathUri,in_array($pathUri, self::EXCEPTIONS));
        //Continua la solicitud en caso de que la url se encuentre dentro de las exepciones
        if(in_array($pathUri, self::EXCEPTIONS)){
            return $next($request); 
        }

        //Obtenemos la informacion del usuario respecto a la url solicitada
        $this->rol_usuario = $this->obtenerPermisosUsuario($this->usuario->id, $pathUri,$Accion);

        //Obtenemos el enlace a redireccionar dependiendo de los permisos del usuario
        $this->redirected_to = !empty($this->rol_usuario) && $this->rol_usuario->Read ? URL::previous() : '/';

        // Rechaza la solicitud entrante dependiendo si el usuario tiene permisos o no,
        if (isset($this->match[$Accion])) {
            if (!$this->validarPermiso($this->match[$Accion])) {
                return $this->dispatch($request->ajax());
            }
        } else {
            Flash::warning($this->getMessage('AM-0002'));
            return response()->json(['warning' => $this->getMessage('AM-0002')], 403);
        }

        //Continua la solicitud si la validacion fue correcta
        return $next($request); 
    }

    /**
     * Obtiene una respuesta dependiendo de la solicitud entrante ajax|http
     * @param bool $respuesta_ajax Indica si la solicitud fue realizada mediante ajax
     */
    public function dispatch(bool $respuesta_ajax)
    {
        if (!$respuesta_ajax) {
            Flash::warning($this->getMessage('AM-0002'));
            return redirect($this->redirected_to)->with('warning', $this->getMessage('AM-0002'));
        } else {
            if ($respuesta_ajax) {
                Flash::warning($this->getMessage('AM-0002'));
                return response()->json(['warning' => $this->getMessage('AM-0002')], 405);
            }
        }
    }

    /**
     * Devuelve el permiso sobre la accion solicitada
     * @param string $accion Accion a ejecutar
     */
    private function validarPermiso(string $accion):  bool
    {

        if (!$this->rol_usuario) {
            return false;
        }

        // devuelve el permiso dependiendo de la acción solicitada
        switch ($accion) {
            case 'show': return $this->rol_usuario->Read;
            case 'update': return $this->rol_usuario->Update;
            case 'delete': return $this->rol_usuario->Delete;
            case 'insert': return $this->rol_usuario->Create;
            default: return false;
        }
    }


    /**
     * Obtiene la informacion del usuario solicitado respecto a la url a procesar
     * @param int $id Id del usuario a consultar
     * @param string $name_route Nombre de la ruta a procesar
     * @param string $pathUri Url solicitada
     */
    private function obtenerPermisosUsuario($id, string $pathUri,$name_route): stdClass|null
    {
        // Verifica si el nombre de la ruta contiene '.index' y actúa en consecuencia
        if (strpos($name_route, 'INDEX') === false) {
            $pathUri = explode('/', $pathUri);
            $pathUri = $pathUri[0];
        }

        $resultado = DB::table('usuarios_roles as ur')
            ->leftJoin('roles_permisos as rp', 'rp.Roles_id', 'ur.Roles_id')
            ->leftJoin('modulos as m', 'm.id', 'rp.Modulos_id')
            ->leftJoin('routes as r', 'r.id', 'm.MoRoute')
            ->select('url', 'method', 'Read', 'Update', 'Delete', 'Create')
            ->where([
                ['ur.Users_id', $id],
                ['r.url',$pathUri]
            ])->first();

        return $resultado;
    }


    /**
     * Obtiene un mensaje de estado en funcion del codigo indicado para mostrar en la respuesta.
     * @param string $codigo Condigo del mensaje
     */
    public function getMessage($codigo){
        return $this->mensajes[$codigo] ?? "Accion no permtida";
    }
}
