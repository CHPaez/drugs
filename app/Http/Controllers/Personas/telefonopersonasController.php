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
use Flash;
use Response;

class telefonopersonasController extends AppBaseController
{
    /** @var telefonopersonasRepository $telefonopersonasRepository*/
    private $telefonopersonasRepository;

    public function __construct(telefonopersonasRepository $telefonopersonasRepo)
    {
        $this->telefonopersonasRepository = $telefonopersonasRepo;
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

        return view('telefonopersonas.index')
            ->with('telefonopersonas', $telefonopersonas);
    }

    /**
     * Show the form for creating a new telefonopersonas.
     *
     * @return Response
     */
    public function create()
    {

        $personas = personas::pluck('PeNumeroIdentificacion', 'id');
        $tipostelefonos = tipostelefonos::pluck('TtTipo', 'id');
        $indicativosciudades = indicativosciudades::pluck('IcIndicativo', 'id');

        return view('telefonopersonas.create')
        ->with('personas', $personas)
        ->with('tipostelefonos', $tipostelefonos)
        ->with('indicativosciudades', $indicativosciudades);
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

        return redirect(route('telefonopersonas.index'));
    }

    /**
     * Display the specified telefonopersonas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $telefonopersonas = $this->telefonopersonasRepository->find($id);

        if (empty($telefonopersonas)) {
            Flash::error('Telefonopersonas not found');

            return redirect(route('telefonopersonas.index'));
        }

        return view('telefonopersonas.show')->with('telefonopersonas', $telefonopersonas);
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

        if (empty($telefonopersonas)) {
            Flash::error('Telefonopersonas not found');

            return redirect(route('telefonopersonas.index'));
        }

        return view('telefonopersonas.edit')->with('telefonopersonas', $telefonopersonas);
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

            return redirect(route('telefonopersonas.index'));
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
