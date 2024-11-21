<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Requests\UpdateRolesRequest;
use App\Repositories\RolesRepository;
use App\Repositories\AdministracionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Administracion\User_Roles;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

/**
 * Modulo de administracion y creacion de roles
 * @author Sebastian Diaz <d12sebastian21@gmail.com>
 * @version 1.0.0
*/

class RolesController extends AppBaseController
{
    private $RolesRepository;
    private $Usuarios;
    private  $acciones_crear_roles = [
        "crear" => ['button','nuevo_rol','nuevo_rol'],
        "guardar" => ['submit','guardar','btn_guardar','d-none'],
        "actualizar" => ['button','btn_actualizar','btn_actualizar','d-none actualizar'],
        "editar" => ['button','edit_rol','edit_rol','editar'],
        "eliminar" => ['button','eliminar','eliminar','eliminar']
    ];

    private  $acciones_admin_roles = [
        "crear" => ['button','nuevo_rol','nuevo_rol'],
        "guardar" => ['submit','guardar','btn_guardar','d-none'],
        "actualizar" => ['button','btn_actualizar','btn_actualizar','d-none actualizar'],
        "editar" => ['button','edit_rol','edit_rol','editar'],
        "eliminar" => ['button','eliminar','eliminar','eliminar']
    ];
    
    
    public function __construct(RolesRepository $RolesRepo,AdministracionRepository $Usuarios)
    {
        $this->RolesRepository = $RolesRepo;
        $this->Usuarios = $Usuarios;
    }
    public function index(Request $request){
        $usuario = Auth::user();
        $incluir_botones = $this->incluirBotones($usuario,$this->acciones_crear_roles,$request);
        $menu = $this->init()->get_links();

        $roles = $this->RolesRepository->all();
        return view('Administracion/Roles/index')->with(compact('roles','incluir_botones','menu'));
    }

    public function update(UpdateRolesRequest $request){

        if($request->datos['bandera'] == 'Actualizar'){
            $input = $request->datos['datosRoles'];
            foreach ($input as $key => $value) {
                $id = $value['id'];
                unset($value['id']);
                $this->RolesRepository->update($value,$id);
            }
        }

        Flash::success("El Rol se actulizo correctamente.");

    }

    public function store(Request $request){

        $input = $request->all();
        $rol = [];
        $contador = 0;

        foreach ($input as $key => $value) {
   
            // Verificar si la clave comienza con 'rol_nombre'
            if (strpos($key, 'rol_nombre') === 0) {
                // Construir la nueva entrada para el rol
                $rol[$contador]['RoNombre'] = $value;

            }
            elseif (strpos($key, 'descripcion') === 0) {
                // Construir la nueva entrada para el rol
                $rol[$contador]['RoDescripcion'] = $value;
                // Incrementar el contador de roles
                $contador++;
            }

        }
       // dd($rol); 
        $this->RolesRepository->fill($rol);

        Flash::success("El usuario se agrego correctamente.");

        return redirect(route('Roles.index'));
    }

    /**
     * Remove the specified asociados from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if($request->bandera == 'eliminar'){
            $rol = $this->RolesRepository->find($request->id);

            if (empty($rol)) {
                Flash::error('El rol no fue encontrado');
            }
    
            $this->RolesRepository->delete($request->id);
    
            Flash::success('El rol fue eliminado de manera correcta.');

        }

    }

    public function rolesUsuario(Request $request){
        $roles = User_Roles::from('usuarios_roles as UR')
        ->select('UR.id AS id','RO.RoNombre as rol_name', 'US.name as user_name','Roles_id','Users_id')
        ->leftJoin('roles as RO', 'RO.id', '=', 'Roles_id')
        ->leftJoin('users as US', 'US.id', '=', 'Users_id')
        ->get()->toArray();
        $usuario = Auth::user();
        $request->route()->getName();
        $incluir_botones = $this->incluirBotones($usuario,$this->acciones_admin_roles,$request);
        $menu = $this->init()->get_links();

        return view('Administracion/RolesUsuarios/index')->with(compact('roles','incluir_botones','menu'));
    }
    
    public function selectores(Request $request){

        if($request->bandera == 'roles'){
            $response = $this->RolesRepository->all('json');
        }elseif($request->bandera == 'usuarios'){
            $response = $this->Usuarios->all('json');
        }

        echo $response;
    }

    /**
     * Asigna un rol al usuario indicado
     */
    public function guardarRoles_Usuarios(Request $request){
        $input = $request->all();
        $rol = [];
        $contador = 0;
        foreach ($input as $key => $value) {
   
            // Verificar si la clave comienza con 'rol_nombre'
            if (strpos($key, 'rol') === 0) {
                $rol[$contador]['Roles_id'] = $value;
            }
            elseif (strpos($key, 'user') === 0) {
                $rol[$contador]['Users_id'] = $value;
                $contador++;
            }

        }
        $validacion = Validator::make($rol, [
            '*.Roles_id' => ['required', 'string', 'max:255'],
            '*.Users_id' => ['required', 'string', 'max:255'],
        ]);

    
        User_Roles::insert($rol);

        Flash::success("El rol fue asignado de manera correcta.");


        return redirect(route('roles.usuarios.index'));
    }

    public function actualizarRoles_Usuarios(User_Roles $rolesUsuario,Request $request){
        $validacion = Validator::make($request->all(), [
            'id' => ['required', 'integer'],
            'Users_id' => ['required', 'integer'],
            'Roles_id' => ['required', 'integer'],
        ]);
    
        if ($validacion->fails()) {
           http_response_code(403);
        }
    

        if($request->bandera =='Actualizar'){
            $rolesUsuario->findOrFail($request->id)->update([
                'Users_id' => $request->Users_id,
                'Roles_id' => $request->Roles_id
            ]);

            Flash::success("El rol fue actualizado de manera correcta.");
        }
    }

    public function eliminarRoles_Usuarios(User_Roles $rolesUsuario,Request $request){
        if($request->bandera =='eliminar'){
            $rolesUsuario->findOrFail($request->id)->delete();

            Flash::success("El rol fue eliminado de manera correcta.");
        }
    }
}
