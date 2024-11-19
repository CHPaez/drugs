<?php

namespace App\Http\Controllers\Personas;

use App\Http\Requests\CreategeneroRequest;
use App\Http\Requests\UpdategeneroRequest;
use App\Repositories\generoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class generoController extends AppBaseController
{
    /** @var generoRepository $generoRepository*/
    private $generoRepository;

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

    public function __construct(generoRepository $generoRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($generoRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->generoRepository = $generoRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the genero.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $generos = $this->generoRepository->all();

        return view('personas.generos.index')
            ->with([
                'generos' => $generos,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new genero.
     *
     * @return Response
     */
    public function create()
    {
        return view('personas.generos.create')
        ->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created genero in storage.
     *
     * @param CreategeneroRequest $request
     *
     * @return Response
     */
    public function store(CreategeneroRequest $request)
    {
        $input = $request->all();

        $genero = $this->generoRepository->create($input);

        Flash::success('Genero saved successfully.');

        return redirect(route('generos.index'));
    }


    /**
     * Show the form for editing the specified genero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('generos.index'));
        }

        return view('personas.generos.edit')
        ->with([
            'genero' => $genero,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified genero in storage.
     *
     * @param int $id
     * @param UpdategeneroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategeneroRequest $request)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('generos.index'));
        }

        $genero = $this->generoRepository->update($request->all(), $id);

        Flash::success('Genero updated successfully.');

        return redirect(route('generos.index'));
    }

    /**
     * Remove the specified genero from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('generos.index'));
        }

        $this->generoRepository->delete($id);

        Flash::success('Genero deleted successfully.');

        return redirect(route('generos.index'));
    }
}