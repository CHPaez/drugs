<?php

namespace App\Http\Controllers\Personas;

use App\Models\Genero;
use App\Models\TiposIdentificaciones;


use App\Http\Requests\CreatepersonasRequest;
use App\Http\Requests\UpdatepersonasRequest;
use App\Repositories\personasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class personasController extends AppBaseController
{
    /** @var personasRepository $personasRepository*/
    private $personasRepository;

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

    public function __construct(personasRepository $personasRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($personasRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->personasRepository = $personasRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the personas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $personas = $this->personasRepository->all();
        // Obtener solo los c�digos de asociados como clave y valor
      
        return view('personas.index')
            ->with([
                'personas' => $personas,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]); 
    }
    


    /**
     * Show the form for creating a new personas.
     *
     * @return Response
     */
    public function create()
{
     // Obtener solo los nombres de los g�neros
     $generos = Genero::pluck('genombre', 'id');
     $tiposIdentificaciones = tiposIdentificaciones::pluck('TiNombre', 'id');
    

    return view('personas.create')
    ->with([
        'generos' => $generos,
        'tiposIdentificaciones' => $tiposIdentificaciones,
        'incluir_botones' => $this->incluir_botones,
        'menu' => $this->menu,
    ]);
}
    /**
     * Store a newly created personas in storage.
     *
     * @param CreatepersonasRequest $request
     *
     * @return Response
     */
    public function store(CreatepersonasRequest $request)
    {
        $input = $request->all();

        $personas = $this->personasRepository->create($input);

        Flash::success('Personas saved successfully.');

        return redirect(route('personas.index'));
    }


    /**
     * Show the form for editing the specified personas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
{
    $persona = $this->personasRepository->find($id);

    if (empty($persona)) {
        Flash::error('Personas not found');
        return redirect(route('personas.index'));
    }

    // Obtener datos adicionales necesarios para la vista
    $generos = genero::pluck('GeNombre','id');
    $tiposIdentificaciones = TiposIdentificaciones::pluck('TiNombre','id');
    

    return view('personas.edit')
    ->with([
        'tiposIdentificaciones' => $tiposIdentificaciones,
        'persona' => $persona,
        'generos' => $generos,
        'incluir_botones' => $this->incluir_botones,
        'menu' => $this->menu,
    ]);
}


    /**
     * Update the specified personas in storage.
     *
     * @param int $id
     * @param UpdatepersonasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepersonasRequest $request)
    {
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            Flash::error('Personas not found');

            return redirect(route('personas.index'));
        }

        $personas = $this->personasRepository->update($request->all(), $id);

        Flash::success('Personas updated successfully.');

        return redirect(route('personas.index'));
    }

    /**
     * Remove the specified personas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            Flash::error('Personas not found');

            return redirect(route('personas.index'));
        }

        $this->personasRepository->delete($id);

        Flash::success('Personas deleted successfully.');

        return redirect(route('personas.index'));
    }
}
