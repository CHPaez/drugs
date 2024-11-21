<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Requests\UpdateAdministracionRequest;
use App\Repositories\AdministracionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

/**
 * Modulo de creacion de usuarios
 * @author Sebastian Diaz <d12sebastian21@gmail.com>
 * @version 1.0.0
*/

class AdministradorController extends AppBaseController
{
    private $AdministracionRepository;

    /** @var Array  botones dispobible en la  vista*/
    private  $acciones_disponibles = [
        "crear" => ['button','nuevo_modulo','nuevo_modulo'],
        "guardar" => ['submit','guardar','btn_guardar'],
        "actualizar" => ['submit','btn_actualizar','btn_actualizar'],
        "editar" => ['button','editar_usuario','editar_usuario'],
        "eliminar" => ['button','eliminar','eliminar']
    ];

    /** @var Array Contine los botones disponibles para el usuario logueado */
    private $incluir_botones;

    /** @var Array Contine el menu con los hiperlinks disponibles para el usuario logueado */
    private $menu;

    public function __construct(AdministracionRepository $AdministracionRepo, Request $request)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($AdministracionRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->AdministracionRepository = $AdministracionRepo;
            
            return $next($request);
        });

    }   

    /** Vista general del modulo de creacion de usuarios */
    public function index(){
        $datos_usuario = $this->AdministracionRepository->all();

        return view('Administracion/Usuarios/index')->with([
            'usuarios' => $datos_usuario,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Obtiene la vista para poder editar la informacion de un usuario en especifico
     */
    public function edit($id){
        $usuario = $this->AdministracionRepository->find($id);

        return view('Administracion/usuarios/edit')->with([
            'usuario' => $usuario,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /** Actualiza la informacion de un usuario en especifico */
    public function update($id,UpdateAdministracionRequest $request){
        $usuario = $this->AdministracionRepository->find($id);

        if(empty($usuario)){
            Flash::error("El usuario no fue encontrad");
            return redirect(route('Administracion.index'));
        }
        $this->AdministracionRepository->update($request->all(),$id);

        Flash::success("El usuario se actulizo correctamente.");

        return redirect(route('Administracion.index'));

    }

    /** Vista para poder crear un nuevo usuario */
    public function create(){
        return view('Administracion/Usuarios/create')->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Guarda un usuario
     */
    public function store(Request $request){
        $validacion =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $input = $request->all();

        $this->AdministracionRepository->create($input);

        Flash::success("El usuario se agrego correctamente.");

        return redirect(route('Administracion.index'));
    }

    /**
     * Obtiene la informacion del usuario solicitado respecto a la url a procesar
     */
    public static function obtenerPermisosUsuario(): Collection
    {
        $usuario_id = optional(Auth::user())->id;

        return DB::table('usuarios_roles as ur')
        ->leftJoin('roles_permisos as rp', 'rp.Roles_id', 'ur.Roles_id')
        ->leftJoin('modulos as m', 'm.id', 'rp.Modulos_id')
        ->leftJoin('routes as r', 'r.id', 'm.MoRoute')
        ->select('MoNombre', 'MoSubmodulo')
        ->where([
            ['ur.Users_id', $usuario_id],
            ['rp.Read','1']
        ])
        ->where(function ($query) {
            $query->where('r.method', 'GET')
                  ->orWhere('r.method', 'GET|HEAD');
        })->get();
    }
    
}
