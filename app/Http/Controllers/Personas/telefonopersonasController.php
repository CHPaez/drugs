<?php

namespace App\Http\Controllers\Personas;

use App\Models\personas;
use App\Models\tipostelefonos;
use App\Models\indicativosciudades;


use App\Http\Requests\CreatetelefonopersonasRequest;
use App\Http\Requests\UpdatetelefonopersonasRequest;
use App\Repositories\telefonopersonasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class telefonopersonasController extends AppBaseController
{
    /** @var telefonopersonasRepository $telefonopersonasRepository*/
    private $telefonopersonasRepository;

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

    public function __construct(telefonopersonasRepository $telefonopersonasRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($telefonopersonasRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->telefonopersonasRepository = $telefonopersonasRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the telefonopersonas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $telefonopersonas = $this->telefonopersonasRepository->all();

        return view('personas.telefonopersonas.index')
            ->with([
                'telefonopersonas' => $telefonopersonas,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new telefonopersonas.
     *
     * @return Response
     */
    public function create()
    {
        $telefonopersonas = $this->telefonopersonasRepository->all();

        $personas = personas::pluck('PeNumeroIdentificacion', 'id');
        $tipostelefonos = tipostelefonos::pluck('TtTipo', 'id');
        $indicativosciudades = indicativosciudades::pluck('IcIndicativo', 'id');

        return view('personas.telefonopersonas.create')
        ->with([
            'telefonopersonas' => $telefonopersonas,
            'personas' => $personas,
            'tipostelefonos' => $tipostelefonos,
            'indicativosciudades' => $indicativosciudades,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Store a newly created telefonopersonas in storage.
     *
     * @param CreatetelefonopersonasRequest $request
     *
     * @return Response
     */
    public function store(CreatetelefonopersonasRequest $request)
    {
        $input = $request->all();

        $telefonopersonas = $this->telefonopersonasRepository->create($input);

        Flash::success('Telefonopersonas saved successfully.');

        return redirect(route('personas.telefonopersonas.index'));
    }


    /**
     * Show the form for editing the specified telefonopersonas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $telefonopersonas = $this->telefonopersonasRepository->find($id);
      
        $personas = personas::pluck('PeNumeroIdentificacion', 'id');
        $tipostelefonos = tipostelefonos::pluck('TtTipo', 'id');
        $indicativosciudades = indicativosciudades::pluck('IcIndicativo', 'id');

        if (empty($telefonopersonas)) {
            Flash::error('Telefonopersonas not found');

            return redirect(route('personas.telefonopersonas.index'));
        }

        return view('personas.telefonopersonas.edit')
        ->with([
            'telefonopersonas' => $telefonopersonas,
            'personas' => $personas,
            'tipostelefonos' => $tipostelefonos,
            'indicativosciudades' => $indicativosciudades,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified telefonopersonas in storage.
     *
     * @param int $id
     * @param UpdatetelefonopersonasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetelefonopersonasRequest $request)
    {
        $telefonopersonas = $this->telefonopersonasRepository->find($id);

        if (empty($telefonopersonas)) {
            Flash::error('Telefonopersonas not found');

            return redirect(route('ptelefonopersonas.index'));
        }

        $telefonopersonas = $this->telefonopersonasRepository->update($request->all(), $id);

        Flash::success('Telefonopersonas updated successfully.');

        return redirect(route('telefonopersonas.index'));
    }

    /**
     * Remove the specified telefonopersonas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $telefonopersonas = $this->telefonopersonasRepository->find($id);

        if (empty($telefonopersonas)) {
            Flash::error('Telefonopersonas not found');

            return redirect(route('telefonopersonas.index'));
        }

        $this->telefonopersonasRepository->delete($id);

        Flash::success('Telefonopersonas deleted successfully.');

        return redirect(route('telefonopersonas.index'));
    }
}
