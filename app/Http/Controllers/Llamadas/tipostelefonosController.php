<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreatetipostelefonosRequest;
use App\Http\Requests\UpdatetipostelefonosRequest;
use App\Repositories\tipostelefonosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class tipostelefonosController extends AppBaseController
{
    /** @var tipostelefonosRepository $tipostelefonosRepository*/
    private $tipostelefonosRepository;

    /** @var Array  botones dispobible en la  vista*/
    private  $acciones_disponibles = [
        "crear" => ['button','nuevo_telefono','nuevo_telefono'],
        "guardar" => ['submit','guardar','btn_guardar'],
        "actualizar" => ['submit','btn_actualizar','btn_actualizar'],
        "editar" => ['button','editar_t_tel','editar_t_tel'],
        "eliminar" => ['submit','eliminar_t_tel','eliminar_t_tel']
    ];

    /** @var Array Contine los botones disponibles para el usuario logueado */
    private $incluir_botones;

    /** @var Array Contine el menu con los hiperlinks disponibles para el usuario logueado */
    private $menu;

    public function __construct(tipostelefonosRepository $tipostelefonosRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($tipostelefonosRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->tipostelefonosRepository = $tipostelefonosRepo;
            
            return $next($request);
        });
       
    }

    /**
     * Display a listing of the tipostelefonos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $tipostelefonos = $this->tipostelefonosRepository->all();

        return view('llamadas.tipostelefonos.index')
            ->with([
                'tipostelefonos' => $tipostelefonos,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new tipostelefonos.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.tipostelefonos.create')->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created tipostelefonos in storage.
     *
     * @param CreatetipostelefonosRequest $request
     *
     * @return Response
     */
    public function store(CreatetipostelefonosRequest $request)
    {
        $input = $request->all();

        $this->tipostelefonosRepository->create($input);

        Flash::success('Se ha agregado un nuevo tipo de telefono de manera satisfactoria');

        return redirect(route('tipostelefonos.index'));
    }


    /**
     * Show the form for editing the specified tipostelefonos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            Flash::error('El tipo de telefono no fue encontrado');

            return redirect(route('llamadas.tipostelefonos.index'));
        }

        return view('llamadas.tipostelefonos.edit')->with([
            'tipostelefonos' => $tipostelefonos,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified tipostelefonos in storage.
     *
     * @param int $id
     * @param UpdatetipostelefonosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipostelefonosRequest $request)
    {
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            Flash::error('El tipo de telefono no fue encontrado');

            return redirect(route('llamadas.tipostelefonos.index'));
        }

        $tipostelefonos = $this->tipostelefonosRepository->update($request->all(), $id);

        Flash::success('El tipo de telefono fue actualizado de manera correcta');

        return redirect(route('llamadas.tipostelefonos.index'));
    }

    /**
     * Remove the specified tipostelefonos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            Flash::error('El tipo de telefono no fue encontrado');

            return redirect(route('tipostelefonos.index'));
        }

        $this->tipostelefonosRepository->delete($id);

        Flash::success('El tipo de telefono fue eliminado de manera correcta');

        return redirect(route('tipostelefonos.index'));
    }
}