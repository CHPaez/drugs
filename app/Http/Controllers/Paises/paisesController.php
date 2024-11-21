<?php

namespace App\Http\Controllers\Paises;

use App\Http\Requests\CreatepaisesRequest;
use App\Http\Requests\UpdatepaisesRequest;
use App\Repositories\paisesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class paisesController extends AppBaseController
{
    /** @var paisesRepository $paisesRepository*/
    private $paisesRepository;

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

    public function __construct(paisesRepository $paisesRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($paisesRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->paisesRepository = $paisesRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the paises.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $paises = $this->paisesRepository->all();

        return view('paises.index')
        ->with([
            'paises' => $paises,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Show the form for creating a new paises.
     *
     * @return Response
     */
    public function create()
    {
        return view('paises.create')
        ->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created paises in storage.
     *
     * @param CreatepaisesRequest $request
     *
     * @return Response
     */
    public function store(CreatepaisesRequest $request)
    {
        $input = $request->all();

        $paises = $this->paisesRepository->create($input);

        Flash::success('Paises saved successfully.');

        return redirect(route('paises.index'));
    }

    /**
     * Show the form for editing the specified paises.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        return view('paises.edit')
        ->with([
            'paises' => $paises,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified paises in storage.
     *
     * @param int $id
     * @param UpdatepaisesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepaisesRequest $request)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        $paises = $this->paisesRepository->update($request->all(), $id);

        Flash::success('Paises updated successfully.');

        return redirect(route('paises.index'));
    }

    /**
     * Remove the specified paises from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        $this->paisesRepository->delete($id);

        Flash::success('Paises deleted successfully.');

        return redirect(route('paises.index'));
    }
}
