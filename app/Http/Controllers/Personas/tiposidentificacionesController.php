<?php

namespace App\Http\Controllers\Personas;

use App\Http\Requests\CreatetiposidentificacionesRequest;
use App\Http\Requests\UpdatetiposidentificacionesRequest;
use App\Repositories\tiposidentificacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class tiposidentificacionesController extends AppBaseController
{
    /** @var tiposidentificacionesRepository $tiposidentificacionesRepository*/
    private $tiposidentificacionesRepository;

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

    public function __construct(tiposidentificacionesRepository $tiposidentificacionesRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($tiposidentificacionesRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->tiposidentificacionesRepository = $tiposidentificacionesRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the tiposidentificaciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->all();

        return view('personas.tiposidentificaciones.index')
            ->with([
                'tiposidentificaciones' => $tiposidentificaciones,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new tiposidentificaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('personas.tiposidentificaciones.create')
        ->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created tiposidentificaciones in storage.
     *
     * @param CreatetiposidentificacionesRequest $request
     *
     * @return Response
     */
    public function store(CreatetiposidentificacionesRequest $request)
    {
        $input = $request->all();

        $tiposidentificaciones = $this->tiposidentificacionesRepository->create($input);

        Flash::success('Tiposidentificaciones saved successfully.');

        return redirect(route('tiposidentificaciones.index'));
    }

    /**
     * Show the form for editing the specified tiposidentificaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            Flash::error('Tiposidentificaciones not found');

            return redirect(route('tiposidentificaciones.index'));
        }

        return view('personas.tiposidentificaciones.edit')
        ->with([
            'tiposidentificaciones' => $tiposidentificaciones,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified tiposidentificaciones in storage.
     *
     * @param int $id
     * @param UpdatetiposidentificacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiposidentificacionesRequest $request)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            Flash::error('Tiposidentificaciones not found');

            return redirect(route('tiposidentificaciones.index'));
        }

        $tiposidentificaciones = $this->tiposidentificacionesRepository->update($request->all(), $id);

        Flash::success('Tiposidentificaciones updated successfully.');

        return redirect(route('tiposidentificaciones.index'));
    }

    /**
     * Remove the specified tiposidentificaciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            Flash::error('Tiposidentificaciones not found');

            return redirect(route('tiposidentificaciones.index'));
        }

        $this->tiposidentificacionesRepository->delete($id);

        Flash::success('Tiposidentificaciones deleted successfully.');

        return redirect(route('tiposidentificaciones.index'));
    }
}
