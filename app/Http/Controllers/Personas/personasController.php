<?php

namespace App\Http\Controllers\Personas;

use App\Models\Genero;
use App\Models\TiposAsociados;
use App\Models\TiposIdentificaciones;
use App\Models\EstadosPersonas; 

use App\Http\Requests\CreatepersonasRequest;
use App\Http\Requests\UpdatepersonasRequest;
use App\Repositories\personasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class personasController extends AppBaseController
{
    /** @var personasRepository $personasRepository*/
    private $personasRepository;

    public function __construct(personasRepository $personasRepo)
    {
        $this->personasRepository = $personasRepo;
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
      
        $estadospersonas = EstadosPersonas::pluck('EsEstado', 'id');
        $tiposasociados = tiposasociados::pluck('TaNombre', 'id');
    
        return view('personas.index')
            ->with('personas', $personas)
            ->with('estadospersonas', $estadospersonas)
            ->with('tiposasociados', $tiposasociados); 
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
     $tiposAsociados = TiposAsociados::pluck('TaNombre', 'id');
     $tiposIdentificaciones = tiposIdentificaciones::pluck('TiNombre', 'id');
     $estadospersonas = EstadosPersonas::pluck('EsEstado', 'id');

   

    return view('personas.create', compact('generos', 'tiposAsociados', 'tiposIdentificaciones','estadospersonas'));
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
     * Display the specified personas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            Flash::error('Personas not found');

            return redirect(route('personas.index'));
        }

        return view('personas.show')->with('personas', $personas);
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
    $tiposAsociados = TiposAsociados::pluck('TaNombre','id');
    $tiposIdentificaciones = TiposIdentificaciones::pluck('TiNombre','id');
    $estadospersonas = EstadosPersonas::pluck('EsEstado', 'id');

    return view('personas.edit', compact('persona', 'generos', 'tiposAsociados', 'tiposIdentificaciones', 'estadospersonas'));
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
