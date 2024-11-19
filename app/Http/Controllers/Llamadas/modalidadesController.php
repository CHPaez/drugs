<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreatemodalidadesRequest;
use App\Http\Requests\UpdatemodalidadesRequest;
use App\Repositories\modalidadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class modalidadesController extends AppBaseController
{
    /** @var modalidadesRepository $modalidadesRepository*/
    private $modalidadesRepository;

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

    public function __construct(modalidadesRepository $modalidadesRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($modalidadesRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->modalidadesRepository = $modalidadesRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the modalidades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $modalidades = $this->modalidadesRepository->all();
        
        return view('llamadas.modalidades.index')
            ->with([
                'modalidades' => $modalidades,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new modalidades.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.modalidades.create')->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created modalidades in storage.
     *
     * @param CreatemodalidadesRequest $request
     *
     * @return Response
     */
    public function store(CreatemodalidadesRequest $request)
    {
        $input = $request->all();

        $modalidades = $this->modalidadesRepository->create($input);

        Flash::success('Modalidades saved successfully.');

        return redirect(route('modalidades.index'));
    }


    /**
     * Show the form for editing the specified modalidades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            Flash::error('Modalidades not found');

            return redirect(route('modalidades.index'));
        }

        return view('llamadas.modalidades.edit')->with([
            'modalidades' => $modalidades,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified modalidades in storage.
     *
     * @param int $id
     * @param UpdatemodalidadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemodalidadesRequest $request)
    {
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            Flash::error('Modalidades not found');

            return redirect(route('modalidades.index'));
        }

        $modalidades = $this->modalidadesRepository->update($request->all(), $id);

        Flash::success('Modalidades updated successfully.');

        return redirect(route('modalidades.index'));
    }

    /**
     * Remove the specified modalidades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            Flash::error('Modalidades not found');

            return redirect(route('modalidades.index'));
        }

        $this->modalidadesRepository->delete($id);

        Flash::success('Modalidades deleted successfully.');

        return redirect(route('modalidades.index'));
    }
}
