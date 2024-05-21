<?php

namespace App\Http\Controllers\Droguerias;

use App\Models\asociados;
use App\Models\droguerias;
use App\Models\personas;

use App\Http\Requests\CreatedrogueriaspersonasRequest;
use App\Http\Requests\UpdatedrogueriaspersonasRequest;
use App\Repositories\drogueriaspersonasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class drogueriaspersonasController extends AppBaseController
{
    /** @var drogueriaspersonasRepository $drogueriaspersonasRepository*/
    private $drogueriaspersonasRepository;

    public function __construct(drogueriaspersonasRepository $drogueriaspersonasRepo)
    {
        $this->drogueriaspersonasRepository = $drogueriaspersonasRepo;
    }

    /**
     * Display a listing of the drogueriaspersonas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $drogueriaspersonas = $this->drogueriaspersonasRepository->all();

        return view('droguerias.drogueriaspersonas.index')
            ->with('drogueriaspersonas', $drogueriaspersonas);
    }

    /**
     * Show the form for creating a new drogueriaspersonas.
     *
     * @return Response
     */
    public function create()
    {


        $asociados = asociados::pluck('AsCodigo', 'id');
        $droguerias = droguerias::pluck('DrNombre', 'id');
        $personas = personas::pluck('PeNumeroIdentificacion', 'id');


        return view('droguerias.drogueriaspersonas.create')
        ->with('asociados', $asociados)
        ->with('droguerias', $droguerias)
        ->with('personas', $personas);
    }

    /**
     * Store a newly created drogueriaspersonas in storage.
     *
     * @param CreatedrogueriaspersonasRequest $request
     *
     * @return Response
     */
    public function store(CreatedrogueriaspersonasRequest $request)
    {
        $input = $request->all();

        $drogueriaspersonas = $this->drogueriaspersonasRepository->create($input);

        Flash::success('Drogueriaspersonas saved successfully.');

        return redirect(route('drogueriaspersonas.index'));
    }

    /**
     * Display the specified drogueriaspersonas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);

        if (empty($drogueriaspersonas)) {
            Flash::error('Drogueriaspersonas not found');

            return redirect(route('drogueriaspersonas.index'));
        }

        return view('droguerias.drogueriaspersonas.show')->with('drogueriaspersonas', $drogueriaspersonas);
    }

    /**
     * Show the form for editing the specified drogueriaspersonas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);
        $asociados = asociados::pluck('AsCodigo', 'id');
        $droguerias = droguerias::pluck('DrNombre', 'id');
        $personas = personas::pluck('PeNumeroIdentificacion', 'id');

        if (empty($drogueriaspersonas)) {
            Flash::error('Drogueriaspersonas not found');

            return redirect(route('drogueriaspersonas.index'));
        }

        return view('droguerias.drogueriaspersonas.edit')
        ->with('drogueriaspersonas', $drogueriaspersonas)
        ->with('asociados', $asociados)
        ->with('droguerias', $droguerias)
        ->with('personas', $personas);;
    }

    /**
     * Update the specified drogueriaspersonas in storage.
     *
     * @param int $id
     * @param UpdatedrogueriaspersonasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedrogueriaspersonasRequest $request)
    {
        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);

        if (empty($drogueriaspersonas)) {
            Flash::error('Drogueriaspersonas not found');

            return redirect(route('drogueriaspersonas.index'));
        }

        $drogueriaspersonas = $this->drogueriaspersonasRepository->update($request->all(), $id);

        Flash::success('Drogueriaspersonas updated successfully.');

        return redirect(route('drogueriaspersonas.index'));
    }

    /**
     * Remove the specified drogueriaspersonas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);

        if (empty($drogueriaspersonas)) {
            Flash::error('Drogueriaspersonas not found');

            return redirect(route('drogueriaspersonas.index'));
        }

        $this->drogueriaspersonasRepository->delete($id);

        Flash::success('Drogueriaspersonas deleted successfully.');

        return redirect(route('drogueriaspersonas.index'));
    }
}
