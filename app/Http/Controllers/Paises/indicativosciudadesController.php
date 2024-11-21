<?php

namespace App\Http\Controllers\Paises;

use App\Models\ciudades; 

use App\Http\Requests\CreateindicativosciudadesRequest;
use App\Http\Requests\UpdateindicativosciudadesRequest;
use App\Repositories\indicativosciudadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Response;

class indicativosciudadesController extends AppBaseController
{
    /** @var indicativosciudadesRepository $indicativosciudadesRepository*/
    private $indicativosciudadesRepository;

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

    public function __construct(indicativosciudadesRepository $indicativosciudadesRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($indicativosciudadesRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->indicativosciudadesRepository = $indicativosciudadesRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the indicativosciudades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->all();
        $ciudades = ciudades::pluck('CiuCiudad', 'id');

        return view('paises.indicativosciudades.index')
        ->with([
            'indicativosciudades' => $indicativosciudades,
            'ciudades' =>  $ciudades,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Show the form for creating a new indicativosciudades.
     *
     * @return Response
     */
    public function create()
    {
        $ciudades = ciudades::pluck('CiuCiudad', 'id');
        return view('paises.indicativosciudades.create')
        ->with([
            'ciudades' => $ciudades,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created indicativosciudades in storage.
     *
     * @param CreateindicativosciudadesRequest $request
     *
     * @return Response
     */
    public function store(CreateindicativosciudadesRequest $request)
    {
        $input = $request->all();

        $indicativosciudades = $this->indicativosciudadesRepository->create($input);

        Flash::success('Indicativosciudades saved successfully.');

        return redirect(route('indicativosciudades.index'));
    }

    /**
     * Show the form for editing the specified indicativosciudades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            Flash::error('Indicativosciudades not found');

            return redirect(route('indicativosciudades.index'));
        }

        return view('paises.indicativosciudades.edit')
        ->with([
            'indicativosciudades' => $indicativosciudades,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified indicativosciudades in storage.
     *
     * @param int $id
     * @param UpdateindicativosciudadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateindicativosciudadesRequest $request)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            Flash::error('Indicativosciudades not found');

            return redirect(route('indicativosciudades.index'));
        }

        $indicativosciudades = $this->indicativosciudadesRepository->update($request->all(), $id);

        Flash::success('Indicativosciudades updated successfully.');

        return redirect(route('indicativosciudades.index'));
    }

    /**
     * Remove the specified indicativosciudades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            Flash::error('Indicativosciudades not found');

            return redirect(route('indicativosciudades.index'));
        }

        $this->indicativosciudadesRepository->delete($id);

        Flash::success('Indicativosciudades deleted successfully.');

        return redirect(route('indicativosciudades.index'));
    }
}
