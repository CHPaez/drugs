<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreatedatosadicionalesRequest;
use App\Http\Requests\UpdatedatosadicionalesRequest;
use App\Repositories\datosadicionalesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class datosadicionalesController extends AppBaseController
{
    /** @var datosadicionalesRepository $datosadicionalesRepository*/
    private $datosadicionalesRepository;

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

    public function __construct(datosadicionalesRepository $datosadicionalesRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($datosadicionalesRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->datosadicionalesRepository = $datosadicionalesRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the datosadicionales.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $datosadicionales = $this->datosadicionalesRepository->all();

        return view('llamadas.datosadicionales.index')
        ->with([
            'datosadicionales' => $datosadicionales,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Show the form for creating a new datosadicionales.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.datosadicionales.create')
        ->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created datosadicionales in storage.
     *
     * @param CreatedatosadicionalesRequest $request
     *
     * @return Response
     */
    public function store(CreatedatosadicionalesRequest $request)
    {
        $input = $request->all();

        $datosadicionales = $this->datosadicionalesRepository->create($input);

        Flash::success('Datosadicionales saved successfully.');

        return redirect(route('datosadicionales.index'));
    }

    /**
     * Show the form for editing the specified datosadicionales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            Flash::error('Datosadicionales not found');

            return redirect(route('datosadicionales.index'));
        }

        return view('llamadas.datosadicionales.edit')
        ->with([
            'datosadicionales' => $datosadicionales,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified datosadicionales in storage.
     *
     * @param int $id
     * @param UpdatedatosadicionalesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedatosadicionalesRequest $request)
    {
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            Flash::error('Datosadicionales not found');

            return redirect(route('datosadicionales.index'));
        }

        $datosadicionales = $this->datosadicionalesRepository->update($request->all(), $id);

        Flash::success('Datosadicionales updated successfully.');

        return redirect(route('datosadicionales.index'));
    }

    /**
     * Remove the specified datosadicionales from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            Flash::error('Datosadicionales not found');

            return redirect(route('datosadicionales.index'));
        }

        $this->datosadicionalesRepository->delete($id);

        Flash::success('Datosadicionales deleted successfully.');

        return redirect(route('datosadicionales.index'));
    }
}
