<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreateprogramasRequest;
use App\Http\Requests\UpdateprogramasRequest;
use App\Repositories\programasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;
use Illuminate\Support\Facades\Auth;

class programasController extends AppBaseController
{
    /** @var programasRepository $programasRepository*/
    private $programasRepository;

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


    public function __construct(programasRepository $programasRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($programasRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->programasRepository = $programasRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the programas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $programas = $this->programasRepository->all();

        return view('llamadas.programas.index')
            ->with([
                'programas' => $programas,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new programas.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.programas.create')->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created programas in storage.
     *
     * @param CreateprogramasRequest $request
     *
     * @return Response
     */
    public function store(CreateprogramasRequest $request)
    {
        $input = $request->all();

        $programas = $this->programasRepository->create($input);

        Flash::success('Programas saved successfully.');

        return redirect(route('programas.index'));
    }

    /**
     * Show the form for editing the specified programas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            Flash::error('Programas not found');

            return redirect(route('programas.index'));
        }

        return view('llamadas.programas.edit')->with([
            'programas' => $programas,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified programas in storage.
     *
     * @param int $id
     * @param UpdateprogramasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprogramasRequest $request)
    {
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            Flash::error('Programas not found');

            return redirect(route('programas.index'));
        }

        $programas = $this->programasRepository->update($request->all(), $id);

        Flash::success('Programas updated successfully.');

        return redirect(route('programas.index'));
    }

    /**
     * Remove the specified programas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            Flash::error('Programas not found');

            return redirect(route('programas.index'));
        }

        $this->programasRepository->delete($id);

        Flash::success('Programas deleted successfully.');

        return redirect(route('programas.index'));
    }
}
