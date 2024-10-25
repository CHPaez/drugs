<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreateinscritosRequest;
use App\Http\Requests\UpdateinscritosRequest;
use App\Repositories\inscritosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class inscritosController extends AppBaseController
{
    /** @var inscritosRepository $inscritosRepository*/
    private $inscritosRepository;

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

    public function __construct(inscritosRepository $inscritosRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($inscritosRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->inscritosRepository = $inscritosRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the inscritos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $inscritos = $this->inscritosRepository->all();

        return view('llamadas.inscritos.index')
            ->with([
                'inscritos' => $inscritos,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new inscritos.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.inscritos.create')     
            ->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created inscritos in storage.
     *
     * @param CreateinscritosRequest $request
     *
     * @return Response
     */
    public function store(CreateinscritosRequest $request)
    {
        $input = $request->all();

        $inscritos = $this->inscritosRepository->create($input);

        Flash::success('Inscritos saved successfully.');

        return redirect(route('inscritos.index'));
    }


    /**
     * Show the form for editing the specified inscritos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            Flash::error('Inscritos not found');

            return redirect(route('inscritos.index'));
        }

        return view('inscritos.edit')
        ->with([
            'inscritos' => $inscritos,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified inscritos in storage.
     *
     * @param int $id
     * @param UpdateinscritosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinscritosRequest $request)
    {
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            Flash::error('Inscritos not found');

            return redirect(route('inscritos.index'));
        }

        $inscritos = $this->inscritosRepository->update($request->all(), $id);

        Flash::success('Inscritos updated successfully.');

        return redirect(route('inscritos.index'));
    }

    /**
     * Remove the specified inscritos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            Flash::error('Inscritos not found');

            return redirect(route('inscritos.index'));
        }

        $this->inscritosRepository->delete($id);

        Flash::success('Inscritos deleted successfully.');

        return redirect(route('inscritos.index'));
    }
}
