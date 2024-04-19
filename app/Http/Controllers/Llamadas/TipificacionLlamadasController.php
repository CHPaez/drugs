<?php

namespace App\Http\Controllers\Llamadas;

use Illuminate\Support\Facades\Auth;
use App\Models\drogueriaspersonas; 
use App\Models\Asociados;
use App\Models\personas;
use App\Models\droguerias;
use App\Models\telefonopersonas;

use App\Http\Requests\CreatetipificacionllamadasRequest;
use App\Http\Requests\UpdatetipificacionllamadasRequest;
use App\Repositories\tipificacionllamadasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipificacionllamadasController extends AppBaseController
{
    /** @var tipificacionllamadasRepository $tipificacionllamadasRepository*/
    private $tipificacionllamadasRepository;

    public function __construct(tipificacionllamadasRepository $tipificacionllamadasRepo)
    {
        $this->tipificacionllamadasRepository = $tipificacionllamadasRepo;
    }

    /**
     * Display a listing of the tipificacionllamadas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipificacionllamadas = $this->tipificacionllamadasRepository->all();

        return view('tipificacionllamadas.index')
        
            ->with('tipificacionllamadas', $tipificacionllamadas);
    }

    /**
     * Show the form for creating a new tipificacionllamadas.
     *
     * @return Response
     */
    public function create()
    {
        // Obtener el nombre del usuario de la sesi�n actual
         $userId =  Auth::id();
         $drogueriaspersonas = drogueriaspersonas::all()->toArray();
         $personas = personas::all()->toArray();
         $droguerias = droguerias::all()->toArray();
         $telefonopersonas = telefonopersonas::all()->toArray();

         $personasJson = json_encode($personas);
         $drogueriasJson  = json_encode($droguerias);
         $telefonopersonasJson = json_encode($telefonopersonas);
         //dd($telefonopersonasJson);
        
         $asociados = asociados::all()->pluck('AsCodigo', 'id');
         

        return view('tipificacionllamadas.create')
        ->with('userId', $userId)
        ->with('asociados', $asociados)
        ->with('drogueriaspersonas', $drogueriaspersonas)
        ->with('personas', $personas)
        ->with('droguerias', $droguerias)
        ->with('telefonopersonas', $telefonopersonas)
        ->with('personasJson', $personasJson)
        ->with('drogueriasJson', $drogueriasJson)
        ->with('telefonopersonasJson', $telefonopersonasJson);
    }

    /**
     * Store a newly created tipificacionllamadas in storage.
     *
     * @param CreatetipificacionllamadasRequest $request
     *
     * @return Response
     */
    public function store(CreatetipificacionllamadasRequest $request)
    {
        $input = $request->all();

        $tipificacionllamadas = $this->tipificacionllamadasRepository->create($input);

        Flash::success('Tipificacionllamadas saved successfully.');

        return redirect(route('tipificacionllamadas.index'));
    }

    /**
     * Display the specified tipificacionllamadas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipificacionllamadas = $this->tipificacionllamadasRepository->find($id);

        if (empty($tipificacionllamadas)) {
            Flash::error('Tipificacionllamadas not found');

            return redirect(route('tipificacionllamadas.index'));
        }

        return view('tipificacionllamadas.show')->with('tipificacionllamadas', $tipificacionllamadas);
    }

    /**
     * Show the form for editing the specified tipificacionllamadas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipificacionllamadas = $this->tipificacionllamadasRepository->find($id);

        if (empty($tipificacionllamadas)) {
            Flash::error('Tipificacionllamadas not found');

            return redirect(route('tipificacionllamadas.index'));
        }

        return view('tipificacionllamadas.edit')->with('tipificacionllamadas', $tipificacionllamadas);
    }

    /**
     * Update the specified tipificacionllamadas in storage.
     *
     * @param int $id
     * @param UpdatetipificacionllamadasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipificacionllamadasRequest $request)
    {
        $tipificacionllamadas = $this->tipificacionllamadasRepository->find($id);

        if (empty($tipificacionllamadas)) {
            Flash::error('Tipificacionllamadas not found');

            return redirect(route('tipificacionllamadas.index'));
        }

        $tipificacionllamadas = $this->tipificacionllamadasRepository->update($request->all(), $id);

        Flash::success('Tipificacionllamadas updated successfully.');

        return redirect(route('tipificacionllamadas.index'));
    }

    /**
     * Remove the specified tipificacionllamadas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipificacionllamadas = $this->tipificacionllamadasRepository->find($id);

        if (empty($tipificacionllamadas)) {
            Flash::error('Tipificacionllamadas not found');

            return redirect(route('tipificacionllamadas.index'));
        }

        $this->tipificacionllamadasRepository->delete($id);

        Flash::success('Tipificacionllamadas deleted successfully.');

        return redirect(route('tipificacionllamadas.index'));
    }
}
