<?php

namespace App\Http\Controllers\Paises;

use App\Models\paises;

use App\Http\Requests\CreatedepartamentosRequest;
use App\Http\Requests\UpdatedepartamentosRequest;
use App\Repositories\departamentosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class departamentosController extends AppBaseController
{
    /** @var departamentosRepository $departamentosRepository*/
    private $departamentosRepository;

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

    public function __construct(departamentosRepository $departamentosRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($departamentosRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->departamentosRepository = $departamentosRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the departamentos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $departamentos = $this->departamentosRepository->all();
        

        return view('paises.departamentos.index') 
        ->with([
            'departamentos' => $departamentos,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Show the form for creating a new departamentos.
     *
     * @return Response 
     */
    public function create()
    {
        $paises = paises::pluck('PaNombre', 'id');

        return view('paises.departamentos.create')
        ->with([
            'paises' => $paises,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created departamentos in storage.
     *
     * @param CreatedepartamentosRequest $request
     *
     * @return Response
     */
    public function store(CreatedepartamentosRequest $request)
    {
        $input = $request->all();

        $departamentos = $this->departamentosRepository->create($input);

        Flash::success('Departamentos saved successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Show the form for editing the specified departamentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departamentos = $this->departamentosRepository->find($id);
        $paises = paises::pluck('PaNombre', 'id');

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        return view('paises.departamentos.edit')
        ->with([
            'departamentos' => $departamentos,
            'paises' => $paises,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified departamentos in storage.
     *
     * @param int $id
     * @param UpdatedepartamentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedepartamentosRequest $request)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        $departamentos = $this->departamentosRepository->update($request->all(), $id);

        Flash::success('Departamentos updated successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified departamentos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        $this->departamentosRepository->delete($id);

        Flash::success('Departamentos deleted successfully.');

        return redirect(route('departamentos.index'));
    }
}
