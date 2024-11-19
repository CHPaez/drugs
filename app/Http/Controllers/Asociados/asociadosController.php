<?php

namespace App\Http\Controllers\Asociados;

use App\Http\Requests\CreateasociadosRequest;
use App\Http\Requests\UpdateasociadosRequest;
use App\Repositories\asociadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class asociadosController extends AppBaseController
{
    /** @var asociadosRepository $asociadosRepository*/
    private $asociadosRepository;

    /** @var Array  botones dispobible en la  vista*/
    private  $acciones_disponibles = [
        "crear" => ['button','c_asociados','c_asociados'],
        "guardar" => ['submit','guardar','btn_guardar'],
        "actualizar" => ['submit','btn_actualizar','btn_actualizar'],
        "editar" => ['button','editar','editar'],
        "eliminar" => ['submit','eliminar','eliminar']
    ];

    /** @var Array Contine los botones disponibles para el usuario logueado */
    private $incluir_botones;

    /** @var Array Contine el menu con los hiperlinks disponibles para el usuario logueado */
    private $menu;

    public function __construct(asociadosRepository $asociadosRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($asociadosRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->asociadosRepository = $asociadosRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the asociados.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $asociados = $this->asociadosRepository->all();

        return view('asociados.index')
            ->with([
                'asociados' => $asociados,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new asociados.
     *
     * @return Response
     */
    public function create()
    {
        return view('asociados.create')->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created asociados in storage.
     *
     * @param CreateasociadosRequest $request
     *
     * @return Response
     */
    public function store(CreateasociadosRequest $request)
    {
        $input = $request->all();

        $this->asociadosRepository->create($input);

        Flash::success('Asociados saved successfully.');

        return redirect(route('asociados.index'));
    }


    /**
     * Show the form for editing the specified asociados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            Flash::error('Asociados not found');

            return redirect(route('asociados.index'));
        }

        return view('asociados.edit')->with([
            'asociados' => $asociados,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified asociados in storage.
     *
     * @param int $id
     * @param UpdateasociadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateasociadosRequest $request)
    {
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            Flash::error('Asociados not found');

            return redirect(route('asociados.index'));
        }

        $asociados = $this->asociadosRepository->update($request->all(), $id);

        Flash::success('Asociados updated successfully.');

        return redirect(route('asociados.index'));
    }

    /**
     * Remove the specified asociados from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            Flash::error('Asociados not found');

            return redirect(route('asociados.index'));
        }

        $this->asociadosRepository->delete($id);

        Flash::success('Asociados deleted successfully.');

        return redirect(route('asociados.index'));
    }
}
