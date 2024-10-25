<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Requests\UpdateModulosRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Administracion\Modulos;
use Laracasts\Flash\Flash;
use App\Models\Administracion\Roles_Permisos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Modulo de administracion y creacion de modulos
 * @author Sebastian Diaz <d12sebastian21@gmail.com>
 * @version 1.0.0
*/

class ModulosController extends AppBaseController
{

    private  $acciones_disponibles = [
        "crear" => ['button','nuevo_modulo','nuevo_modulo'],
        "guardar" => ['submit','guardar','btn_guardar','d-none'],
        "actualizar" => ['button','btn_actualizar','btn_actualizar','d-none actualizar'],
        "editar" => ['button','edit_rol','edit_rol','editar'],
        "eliminar" => ['button','eliminar','eliminar','eliminar']
    ];

    /**Vista principal del administrador de modulos */
    public function index(Request $request){
      
        $usuario = Auth::user();
        $incluir_botones = $this->incluirBotones($usuario,$this->acciones_disponibles,$request);
        $menu = $this->init()->get_links();

        //Datos: Submodulo, modulo,Asignado,PermisosRoles_Permisos
       $roles_permisos = Roles_Permisos::select('Roles_Permisos.id as id',
        'Modulos.MoNombre as modulo', 'Modulos.MoSubmodulo as submodulo','Roles.RoNombre as rol',
        'Roles_Permisos.Roles_id as Roles_id','Roles_Permisos.Modulos_id as Modulos_id','Roles_Permisos.Read'
        ,'Roles_Permisos.Update','Roles_Permisos.Delete','Roles_Permisos.Create')
       ->leftjoin('Modulos', 'Modulos.Id', '=', 'Roles_Permisos.Modulos_id')
       ->leftjoin('Roles','Roles.Id', '=','Roles_Permisos.Roles_id')
       ->get();

        return view('Administracion/Modulos/index')->with(compact('roles_permisos','incluir_botones','menu'));
    }

    /**
     * Obtiene los todos los modulos
     */
    public function getModulos(){
        $routes = modulos::select('id','MoNombre as modulo','MoSubmodulo as submodulo')
        ->get()->toArray();

        return json_encode($routes);
    }

    /**
     * Obtiene los todos los modulos
     */
    public function show(){
        echo $this->getModulos();
    }


    /**
     * Actualiza la informacion del modulo solicitdo
     */
    public function update(UpdateModulosRequest $request){
        $data = $request->all();

        $validacion = Validator::make($data, [
            'bandera' => ['required', 'string'],
            'target' => ['required', 'string'],
            'datosModulo' => ['required','array'],
        ]);

        if ($validacion->fails()) {
            http_response_code(403);
        }

        $input = $data["datosModulo"];
        $modulos_permisos = [];

        //Mapeamos los datos de acuerdo a la tabla
        foreach ($input as $key => $value) {
            if (preg_match('/^modulo_(\d+)$/', $key, $matches)) {
                $indice = $matches[1];

                $modulos_permisos = [
                    'Modulos_id' => isset($input["submodulo_$indice"]) ? $input["submodulo_$indice"] : '',
                    'Roles_id' => isset($input["usuarioRoles_$indice"]) ? $input["usuarioRoles_$indice"] : '',
                    'Read' => (bool) $input['r'],
                    'Update' => (bool) $input['u'] ,
                    'Create' => (bool) $input['c'],
                    'Delete' => (bool) $input['d'],
                    'Estado' => 1,
                ];
            }
        }

        //Validamos que el modulo exista y no este duplicado
        $modulo = roles_permisos::find($data["target"]);

        if (empty($modulo)) {
            Flash::error('El modulo no fue encontrado y/o este se encuentra repetido');
        }

        //Solo debe haber un unico modulo registrado
        try{
            roles_permisos::where('id',$data["target"])->update($modulos_permisos);
            Flash::success("El modulo se actualizo de manera correcta.");
        } catch (\Throwable $th) {
            if($th->getCode() == "23000"){
                Flash::error('La accion no se puede realizar, ya que el submodulo ya se encuentra asignado');
            }
        }

        return response()->json([
            'estado' => 'finalizado'
        ]);

    }

    /**
     * Guarda un nuevo modulo
     */
    public function store(Request $request){
        $input = $request->all();
        $roles_permisos = [];

        //Mapeamos los datos de acuerdo a la tabla
        foreach ($input as $key => $value) {
            if (preg_match('/^modulo_(\d+)$/', $key, $matches)) {
                $indice = $matches[1];
                $roles_permisos[] = [
                    'Modulos_id' => $value,
                    'Roles_id' => isset($input["usuarioRoles_$indice"]) ? $input["usuarioRoles_$indice"] : '',
                    'Read' => isset($input["r_$indice"]) ? $input["r_$indice"] : null,
                    'Update' => isset($input["u_$indice"]) ? $input["u_$indice"] : null,
                    'Create' => isset($input["c_$indice"]) ? $input["c_$indice"] : null,
                    'Delete' => isset($input["d_$indice"]) ? $input["d_$indice"] : null,
                    'Estado' => 1,
                ];
            }
        }

        try {
            Roles_Permisos::insert($roles_permisos);
            Flash::success("El modulo fue agregado de manera correcta.");
        } catch (\Throwable $th) {
            if($th->getCode() == "23000"){
                Flash::error('La accion no se puede realizar, ya que el submodulo ya se encuentra asignado');
            }
        }

        return redirect(route('Modulos.index'));
    }

    public function delete(Request $request){
        if($request->bandera == 'eliminar'){
            $modulo = roles_permisos::find($request->id);

            if (empty($modulo)) {
                Flash::error('El modulo no fue encontrado');
            }
    
            roles_permisos::where('id',$request->id)->delete();
    
            Flash::success('El modulo se ha eliminado de manera correcta');

        }
    }


}
