<?php

namespace App\Http\Controllers\Paises;

use App\Models\departamentos;

use App\Http\Requests\CreateciudadesRequest;
use App\Http\Requests\UpdateciudadesRequest;
use App\Repositories\ciudadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class ciudadesController extends AppBaseController
{
    /** @var ciudadesRepository $ciudadesRepository*/
    private $ciudadesRepository;

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

    public function __construct(ciudadesRepository $ciudadesRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($ciudadesRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->ciudadesRepository = $ciudadesRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the ciudades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ciudades = $this->ciudadesRepository->all();

        return view('paises.ciudades.index')
        ->with([
            'ciudades' => $ciudades,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Show the form for creating a new ciudades.
     *
     * @return Response
     */
    public function create()
    {
        $departamentos = departamentos::pluck('DepDepartamento', 'id');

        return view('paises.ciudades.create')
        ->with([
            'departamentos' => $departamentos,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created ciudades in storage.
     *
     * @param CreateciudadesRequest $request
     *
     * @return Response
     */
    public function store(CreateciudadesRequest $request)
    {
        $input = $request->all();

        $ciudades = $this->ciudadesRepository->create($input);

        Flash::success('Ciudades saved successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Show the form for editing the specified ciudades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $ciudades = $this->ciudadesRepository->find($id);
        $departamentos = departamentos::pluck('DepDepartamento','id');

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        return view('paises.ciudades.edit')
        ->with([
            'ciudades' => $ciudades,
            'departamentos' =>$departamentos,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified ciudades in storage.
     *
     * @param int $id
     * @param UpdateciudadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateciudadesRequest $request)
    {
        $ciudades = $this->ciudadesRepository->find($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        $ciudades = $this->ciudadesRepository->update($request->all(), $id);

        Flash::success('Ciudades updated successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Remove the specified ciudades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ciudades = $this->ciudadesRepository->find($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        $this->ciudadesRepository->delete($id);

        Flash::success('Ciudades deleted successfully.');

        return redirect(route('ciudades.index'));
    }
}
