<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\AppBaseController;
use App\Models\Reportes\Reportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

use Response;

class reportesController extends AppBaseController
{

    /** @var Array  botones dispobible en la  vista*/
    private  $acciones_disponibles = [
        "crear" => ['button', 'crear_reporte', 'crear_reporte','crear_reporte','data-bs-toggle="modal" data-bs-target="#cofigurarReportes"'],
        "guardar" => ['submit', 'guardar', 'btn_guardar'],
        "actualizar" => ['submit', 'btn_actualizar', 'btn_actualizar'],
        "configurar" => ['button', 'btn_configurar', 'btn_configurar','btn_configurar'],
        "ejecutar" => ['button', 'btn_ejecutar', 'btn_ejecutar','btn_ejecutar'],
        "editar" => ['button', 'editar', 'editar'],
        "eliminar" => ['submit', 'eliminar', 'eliminar']
    ];

    /** @var Array Contine los botones disponibles para el usuario logueado */
    private $incluir_botones;

    /** @var Array Contine el menu con los hiperlinks disponibles para el usuario logueado */
    private $menu;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(), $this->acciones_disponibles, $request);
            $this->menu = $this->init()->get_links();

            return $next($request);
        });
    }

    public function selectores(Request $request){
        $request->validate([
            "accion" => "required|string"
        ]);

        if($request->accion == "obtener_columnas"){
            $columnas =  DB::select("DESCRIBE {$request->coleccion}");
            $campos = array_column($columnas, 'Field');
            
            return response()->json($campos);
        }

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

        $views = DB::table('information_schema.tables')
        ->select('table_name')
        ->where('table_schema', env("DB_DATABASE"))
        ->where('table_type', 'VIEW')
        ->get();

        $reportes = Reportes::select("*")->get();

        return view('reportes.index')
            ->with([
                "reportes" => $reportes,
                "vistas" => $views,
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

    }
    /**
     * Store a newly created personas in storage.
     *
     * @param CreatepersonasRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        /*$request->validate([
            "dataCollection" => "required|string",
            "t_filtros.*" => "required|array",
            "formato_salida" => "required|string",
        ]);*/

        $filtros = explode("_",$request->t_filtros[0]);
        $data = [
            "ReNombre" => $request->nombre,
            "ReDataCollection" => $request->dataCollection,
            "ReTarget" =>  $filtros[0],
            "ReFiltro" => $filtros[1],
            "ReSalida" => $request->formato_salida

        ];

        Reportes::insert($data);

        Flash::success('Reporte guardado de manera correcta');

        return redirect(route('reportes.index'));
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

    }


    /**
     * Update the specified personas in storage.
     *
     * @param int $id
     * @param UpdatepersonasRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

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
        
        $reporte = Reportes::find($id);

        if (empty($reporte)) {
            Flash::error('El reporte no fue encontrado');

            return redirect(route('reportes.index'));
        }

        Reportes::where("ReId", $id)->delete();

        Flash::success('Se elimino el reporte de manera correcta.');

        return redirect(route('reportes.index'));
    }
}
