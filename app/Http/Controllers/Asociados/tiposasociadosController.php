<?php

namespace App\Http\Controllers\Asociados;

use App\Http\Requests\CreatetiposasociadosRequest;
use App\Http\Requests\UpdatetiposasociadosRequest;
use App\Repositories\tiposasociadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;

class tiposasociadosController extends AppBaseController
{
    /** @var tiposasociadosRepository $tiposasociadosRepository*/
    private $tiposasociadosRepository;

    /** @var Array  botones dispobible en la  vista*/
    private  $acciones_disponibles = [
        "crear" => ['button','c_tiposasociados','c_tiposasociados'],
        "guardar" => ['submit','guardar','btn_guardar'],
        "actualizar" => ['submit','btn_actualizar','btn_actualizar'],
        "editar" => ['button','editar','editar'],
        "eliminar" => ['submit','eliminar','eliminar']
    ];

    /** @var Array Contine los botones disponibles para el usuario logueado */
    private $incluir_botones;

    /** @var Array Contine el menu con los hiperlinks disponibles para el usuario logueado */
    private $menu;

    public function __construct(tiposasociadosRepository $tiposasociadosRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($tiposasociadosRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->tiposasociadosRepository = $tiposasociadosRepo;

            return $next($request);
        });

    }

    /**
     * Display a listing of the tiposasociados.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $tiposasociados = $this->tiposasociadosRepository->all();

        return view('asociados.tiposasociados.index')
            ->with([
                'tiposasociados' => $tiposasociados,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new tiposasociados.
     *
     * @return Response
     */
    public function create()
    {
        return view('asociados.tiposasociados.create')->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created tiposasociados in storage.
     *
     * @param CreatetiposasociadosRequest $request
     *
     * @return Response
     */
    public function store(CreatetiposasociadosRequest $request)
    {
        $input = $request->all();

        $tiposasociados = $this->tiposasociadosRepository->create($input);

        Flash::success('Tiposasociados saved successfully.');

        return redirect(route('tiposasociados.index'));
    }


    /**
     * Show the form for editing the specified tiposasociados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            Flash::error('Tiposasociados not found');

            return redirect(route('tiposasociados.index'));
        }

        return view('asociados.tiposasociados.edit')->with([
            'tiposasociados' => $tiposasociados,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified tiposasociados in storage.
     *
     * @param int $id
     * @param UpdatetiposasociadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiposasociadosRequest $request)
    {
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            Flash::error('Tiposasociados not found');

            return redirect(route('tiposasociados.index'));
        }

        $tiposasociados = $this->tiposasociadosRepository->update($request->all(), $id);

        Flash::success('Tiposasociados updated successfully.');

        return redirect(route('tiposasociados.index'));
    }

    /**
     * Remove the specified tiposasociados from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            Flash::error('Tiposasociados not found');

            return redirect(route('tiposasociados.index'));
        }

        $this->tiposasociadosRepository->delete($id);

        Flash::success('Tiposasociados deleted successfully.');

        return redirect(route('tiposasociados.index'));
    }
}
