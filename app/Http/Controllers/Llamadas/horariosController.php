<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreatehorariosRequest;
use App\Http\Requests\UpdatehorariosRequest;
use App\Repositories\horariosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class horariosController extends AppBaseController
{
    /** @var horariosRepository $horariosRepository*/
    private $horariosRepository;

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

    public function __construct(horariosRepository $horariosRepo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use($horariosRepo) {
            $this->incluir_botones = $this->incluirBotones(Auth::user(),$this->acciones_disponibles,$request);
            $this->menu = $this->init()->get_links();
            $this->horariosRepository = $horariosRepo;

            return $next($request);
        });
    }

    /**
     * Display a listing of the horarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $horarios = $this->horariosRepository->all();

        return view('llamadas.horarios.index')
            ->with([
                'horarios' => $horarios,
                'incluir_botones' => $this->incluir_botones,
                'menu' => $this->menu,
            ]);
    }

    /**
     * Show the form for creating a new horarios.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.horarios.create')
        ->with([
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);;
    }

    /**
     * Store a newly created horarios in storage.
     *
     * @param CreatehorariosRequest $request
     *
     * @return Response
     */
    public function store(CreatehorariosRequest $request)
    {
        $input = $request->all();

        $horarios = $this->horariosRepository->create($input);

        Flash::success('Horarios saved successfully.');

        return redirect(route('horarios.index'));
    }


    /**
     * Show the form for editing the specified horarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            Flash::error('Horarios not found');

            return redirect(route('horarios.index'));
        }

        return view('llamadas.horarios.edit')
        ->with([
            'horarios' => $horarios,
            'incluir_botones' => $this->incluir_botones,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Update the specified horarios in storage.
     *
     * @param int $id
     * @param UpdatehorariosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehorariosRequest $request)
    {
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            Flash::error('Horarios not found');

            return redirect(route('horarios.index'));
        }

        $horarios = $this->horariosRepository->update($request->all(), $id);

        Flash::success('Horarios updated successfully.');

        return redirect(route('horarios.index'));
    }

    /**
     * Remove the specified horarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            Flash::error('Horarios not found');

            return redirect(route('horarios.index'));
        }

        $this->horariosRepository->delete($id);

        Flash::success('Horarios deleted successfully.');

        return redirect(route('horarios.index'));
    }
}
