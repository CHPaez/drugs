<?php
 
 namespace App\Http\Controllers\Llamadas;



use Illuminate\Support\Facades\Auth;
use App\Models\drogueriaspersonas; 
use App\Models\Asociados;
use App\Models\personas;
use App\Models\droguerias;
use App\Models\telefonopersonas;
use App\Models\programas;
use App\Models\user;

use App\Http\Requests\CreatetipificacionllamadasRequest;
use App\Http\Requests\UpdatetipificacionllamadasRequest;
use App\Repositories\tipificacionllamadasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;

class tipificacionllamadasController extends AppBaseController
{
    /** @var tipificacionllamadasRepository $tipificacionllamadasRepository*/
    private $tipificacionllamadasRepository;

    /** @var Array  botones dispobible en la  vista*/
    private  $acciones_disponibles = [
        "crear" => ['button','c_tipificacion','c_tipificacion'],
        "guardar" => ['submit','guardar','btn_guardar'],
        "actualizar" => ['submit','btn_actualizar','btn_actualizar'],
        "editar" => ['button','editar','editar'],
        "eliminar" => ['submit','eliminar','eliminar']
    ];

    /** @var Array Contine los botones disponibles para el usuario logueado */
    private $incluir_botones;

    /** @var Array Contine el menu con los hiperlinks disponibles para el usuario logueado */
    private $menu;

    public function __construct(tipificacionllamadasRepository $tipificacionllamadasRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($tipificacionllamadasRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->tipificacionllamadasRepository = $tipificacionllamadasRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the tipificacionllamadas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $tipificacionllamadas = $this->tipificacionllamadasRepository->all();

        return view('llamadas.tipificacionllamadas.index')
            ->with([
                'tipificacionllamadas' => $tipificacionllamadas,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new tipificacionllamadas.
     *
     * @return Response
     */
  public function create()
    {
        // Obtener la lista de todos los usuarios para el select
        $users = User::pluck('name', 'id');

        // Obtener el usuario autenticado
         $authenticatedUser = Auth::user();
         $drogueriaspersonas = drogueriaspersonas::all()->toArray();
         $personas = personas::all()->toArray();
         $droguerias = droguerias::all()->toArray();
         $telefonopersonas = telefonopersonas::all()->toArray();
         $programas = programas::all()->pluck('PrNombre', 'id');

         $personasJson = json_encode($personas);
         $drogueriasJson  = json_encode($droguerias);
         $telefonopersonasJson = json_encode($telefonopersonas);
         //dd($telefonopersonasJson);
        
         $asociados = asociados::all()->pluck('AsCodigo', 'id');
          
        $data_vista = [
            'users'=> $users,
            'authenticatedUser'=> $authenticatedUser,
            'asociados'=> $asociados,
            'drogueriaspersonas' => $drogueriaspersonas,
            'personas'=> $personas,
            'droguerias'=> $droguerias,
            'telefonopersonas'=> $telefonopersonas,
            'programas'=> $programas,
            'personasJson'=> $personasJson,
            'drogueriasJson'=> $drogueriasJson,
            'telefonopersonasJson'=> $telefonopersonasJson,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ];

        return view('llamadas.tipificacionllamadas.create')
        ->with($data_vista);
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

        $this->tipificacionllamadasRepository->create($input);

        Flash::success('Tipificacionllamadas saved successfully.');

        return redirect(route('tipificacionllamadas.index'));
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

        return view('llamadas.tipificacionllamadas.edit')->with([
            'tipificacionllamadas' => $tipificacionllamadas,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
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
