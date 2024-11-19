<?php

namespace App\Http\Controllers\Droguerias;

use App\Models\asociados;
use App\Models\droguerias;
use App\Models\personas;
use App\Models\TiposAsociados;
use App\Models\EstadosPersonas;

use App\Http\Requests\CreatedrogueriaspersonasRequest;
use App\Http\Requests\UpdatedrogueriaspersonasRequest;
use App\Repositories\drogueriaspersonasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class drogueriaspersonasController extends AppBaseController
{
    /** @var drogueriaspersonasRepository $drogueriaspersonasRepository*/
    private $drogueriaspersonasRepository;

    /** @var Array  botones dispobible en la  vista*/
    private  $acciones_disponibles = [
        "crear" => ['button','crear','crear'],
        "guardar" => ['submit','guardar','btn_guardar'],
        "actualizar" => ['submit','btn_actualizar','btn_actualizar'],
        "editar" => ['button','editar','editar'],
        "eliminar" => ['submit','eliminar','eliminar']
    ];

    /** @var Array Contine los botones disponibles para el usuario logueado */
    private $incluir_botones;

    /** @var Array Contine el menu con los hiperlinks disponibles para el usuario logueado */
    private $menu;

    public function __construct(drogueriaspersonasRepository $drogueriaspersonasRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($drogueriaspersonasRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->drogueriaspersonasRepository = $drogueriaspersonasRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the drogueriaspersonas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $drogueriaspersonas = $this->drogueriaspersonasRepository->all();
        $tiposasociados = tiposasociados::pluck('TaNombre', 'id');
        

        return view('droguerias.drogueriaspersonas.index')
        ->with([
            'drogueriaspersonas' => $drogueriaspersonas,
            'tiposasociados' => $tiposasociados,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Show the form for creating a new drogueriaspersonas.
     *
     * @return Response
     */
    public function create()
    {


        $asociados = asociados::pluck('AsCodigo', 'id');
        $droguerias = droguerias::pluck('DrNombre', 'id');
        $personas = personas::pluck('PeNumeroIdentificacion', 'id');
        $tiposAsociados = TiposAsociados::pluck('TaNombre', 'id');
        $estadospersonas = EstadosPersonas::pluck('EsEstado', 'id');


        return view('droguerias.drogueriaspersonas.create')
        ->with([
            'asociados' => $asociados,
            'droguerias' => $droguerias,
            'personas' => $personas,
            'tiposAsociados' => $tiposAsociados,
            'estadospersonas' => $estadospersonas,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created drogueriaspersonas in storage.
     *
     * @param CreatedrogueriaspersonasRequest $request
     *
     * @return Response
     */
    public function store(CreatedrogueriaspersonasRequest $request)
    {
        $input = $request->all();

        $drogueriaspersonas = $this->drogueriaspersonasRepository->create($input);

        Flash::success('Drogueriaspersonas saved successfully.');

        return redirect(route('drogueriaspersonas.index'));
    }

    /**
     * Show the form for editing the specified drogueriaspersonas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);
        $asociados = asociados::pluck('AsCodigo', 'id');
        $droguerias = droguerias::pluck('DrNombre', 'id');
        $personas = personas::pluck('PeNumeroIdentificacion', 'id');
        $tiposAsociados = TiposAsociados::pluck('TaNombre','id');
        $estadospersonas = EstadosPersonas::pluck('EsEstado', 'id');

        if (empty($drogueriaspersonas)) {
            Flash::error('Drogueriaspersonas not found');

            return redirect(route('drogueriaspersonas.index'));
        }

        return view('droguerias.drogueriaspersonas.edit')
        ->with([
            'drogueriaspersonas' => $drogueriaspersonas,
            'asociados' => $asociados,
            'droguerias' => $droguerias,
            'personas' => $personas,
            'droguerias' => $droguerias,
            'tiposAsociados' => $tiposAsociados,
            'estadospersonas' => $estadospersonas,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified drogueriaspersonas in storage.
     *
     * @param int $id
     * @param UpdatedrogueriaspersonasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedrogueriaspersonasRequest $request)
    {
        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);

        if (empty($drogueriaspersonas)) {
            Flash::error('Drogueriaspersonas not found');

            return redirect(route('drogueriaspersonas.index'));
        }

        $drogueriaspersonas = $this->drogueriaspersonasRepository->update($request->all(), $id);

        Flash::success('Drogueriaspersonas updated successfully.');

        return redirect(route('drogueriaspersonas.index'));
    }

    /**
     * Remove the specified drogueriaspersonas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);

        if (empty($drogueriaspersonas)) {
            Flash::error('Drogueriaspersonas not found');

            return redirect(route('drogueriaspersonas.index'));
        }

        $this->drogueriaspersonasRepository->delete($id);

        Flash::success('Drogueriaspersonas deleted successfully.');

        return redirect(route('drogueriaspersonas.index'));
    }
}
