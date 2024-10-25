<?php

namespace App\Http\Controllers\Personas;

use App\Http\Requests\CreateestadospersonasRequest;
use App\Http\Requests\UpdateestadospersonasRequest;
use App\Repositories\estadospersonasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class estadospersonasController extends AppBaseController
{
    /** @var estadospersonasRepository $estadospersonasRepository*/
    private $estadospersonasRepository;

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

    public function __construct(estadospersonasRepository $estadospersonasRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($estadospersonasRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->estadospersonasRepository = $estadospersonasRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the estadospersonas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estadospersonas = $this->estadospersonasRepository->all();

        return view('personas.estadospersonas.index')
        ->with([
            'estadospersonas' => $estadospersonas,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Show the form for creating a new estadospersonas.
     *
     * @return Response
     */
    public function create()
    {
        return view('personas.estadospersonas.create');
    }

    /**
     * Store a newly created estadospersonas in storage.
     *
     * @param CreateestadospersonasRequest $request
     *
     * @return Response
     */
    public function store(CreateestadospersonasRequest $request)
    {
        $input = $request->all();

        $estadospersonas = $this->estadospersonasRepository->create($input);

        Flash::success('Estadospersonas saved successfully.');

        return redirect(route('estadospersonas.index'));
    }


    /**
     * Show the form for editing the specified estadospersonas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            Flash::error('Estadospersonas not found');

            return redirect(route('estadospersonas.index'));
        }

        return view('personas.estadospersonas.edit')
        ->with([
            'estadospersonas' => $estadospersonas,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified estadospersonas in storage.
     *
     * @param int $id
     * @param UpdateestadospersonasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestadospersonasRequest $request)
    {
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            Flash::error('Estadospersonas not found');

            return redirect(route('estadospersonas.index'));
        }

        $estadospersonas = $this->estadospersonasRepository->update($request->all(), $id);

        Flash::success('Estadospersonas updated successfully.');

        return redirect(route('estadospersonas.index'));
    }

    /**
     * Remove the specified estadospersonas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            Flash::error('Estadospersonas not found');

            return redirect(route('estadospersonas.index'));
        }

        $this->estadospersonasRepository->delete($id);

        Flash::success('Estadospersonas deleted successfully.');

        return redirect(route('estadospersonas.index'));
    }
}
