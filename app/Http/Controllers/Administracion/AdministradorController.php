<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Requests\CreateAdministracionRequest;
use App\Http\Requests\UpdateAdministracionRequest;
use App\Repositories\AdministracionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class AdministradorController extends AppBaseController
{
    private $AdministracionRepository;

    public function __construct(AdministracionRepository $AdministracionRepo)
    {
        $this->AdministracionRepository = $AdministracionRepo;
    }
    public function index(){
        $datos_usuario = $this->AdministracionRepository->all();
        return view('Administracion/Usuarios/index')->with('usuarios',$datos_usuario);
    }
    public function edit($id){
        $usuario = $this->AdministracionRepository->find($id);
        

        return view('Administracion/usuarios/edit')->with('usuario',$usuario);
    }
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
    public function create(){
        return view('Administracion/Usuarios/create');
    }

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
    
}
