<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Requests\CreateModulosRequest;
use App\Http\Requests\UpdateModulosRequest;
use App\Repositories\ModulosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class ModulosController extends AppBaseController
{
    private $ModulosRepository;

    public function __construct(ModulosRepository $ModulosRepo)
    {
       // $this->ModulosRepository = $ModulosRepo;
    }
    public function index(){
        //$datos_usuario = $this->ModulosRepository->all();
        return view('Administracion/Modulos/index');
    }

    public function edit($id){
        $usuario = $this->ModulosRepository->find($id);
        

        return view('Administracion/usuarios/edit')->with('usuario',$usuario);
    }

    public function update($id,UpdateModulosRequest $request){
        $usuario = $this->ModulosRepository->find($id);

        if(empty($usuario)){
            Flash::error("El usuario no fue encontrad");
            return redirect(route('Administracion.index'));
        }
        $this->ModulosRepository->update($request->all(),$id);

        Flash::success("El usuario se actulizo correctamente.");

        return redirect(route('Administracion.index'));

    }

    public function create(){
        return view('Administracion/Modulos/create');
    }

    public function store(Request $request){
        $validacion =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $input = $request->all();

        $this->ModulosRepository->create($input);

        Flash::success("El usuario se agrego correctamente.");

        return redirect(route('Administracion.index'));
    }

    public function modulos(){
        echo 'Hola';
    }
}
