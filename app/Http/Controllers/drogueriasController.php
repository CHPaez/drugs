<?php

namespace App\Http\Controllers;

use App\Models\tiposdroguerias;
use App\Models\tiposidentificaciones;
use App\Models\ciudades;

use App\Http\Requests\CreatedrogueriasRequest;
use App\Http\Requests\UpdatedrogueriasRequest;
use App\Repositories\drogueriasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class drogueriasController extends AppBaseController
{
    /** @var drogueriasRepository $drogueriasRepository*/
    private $drogueriasRepository;

    public function __construct(drogueriasRepository $drogueriasRepo)
    {
        $this->drogueriasRepository = $drogueriasRepo;
    }

    /**
     * Display a listing of the droguerias.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $droguerias = $this->drogueriasRepository->all();

        return view('droguerias.index')
            ->with('droguerias', $droguerias);
    }

    /**
     * Show the form for creating a new droguerias.
     *
     * @return Response
     */
    public function create()
    {

        $tiposdroguerias = tiposdroguerias::pluck('TdNombre', 'id');
        $tiposidentificaciones = tiposidentificaciones::pluck('TiNombre', 'id');
        $ciudades = ciudades::pluck('CiuCiudad', 'id');

        return view('droguerias.create')
        ->with('tiposdroguerias', $tiposdroguerias)
        ->with('tiposidentificaciones', $tiposidentificaciones)
        ->with('ciudades', $ciudades);
    }

    /**
     * Store a newly created droguerias in storage.
     *
     * @param CreatedrogueriasRequest $request
     *
     * @return Response
     */
    public function store(CreatedrogueriasRequest $request)
    {
        $input = $request->all();

        $droguerias = $this->drogueriasRepository->create($input);

        Flash::success('Droguerias saved successfully.');

        return redirect(route('droguerias.index'));
    }

    /**
     * Display the specified droguerias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $droguerias = $this->drogueriasRepository->find($id);

        if (empty($droguerias)) {
            Flash::error('Droguerias not found');

            return redirect(route('droguerias.index'));
        }

        return view('droguerias.show')->with('droguerias', $droguerias);
    }

    /**
     * Show the form for editing the specified droguerias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $droguerias = $this->drogueriasRepository->find($id);

        if (empty($droguerias)) {
            Flash::error('Droguerias not found');

            return redirect(route('droguerias.index'));
        }

        return view('droguerias.edit')->with('droguerias', $droguerias);
    }

    /**
     * Update the specified droguerias in storage.
     *
     * @param int $id
     * @param UpdatedrogueriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedrogueriasRequest $request)
    {
        $droguerias = $this->drogueriasRepository->find($id);

        if (empty($droguerias)) {
            Flash::error('Droguerias not found');

            return redirect(route('droguerias.index'));
        }

        $droguerias = $this->drogueriasRepository->update($request->all(), $id);

        Flash::success('Droguerias updated successfully.');

        return redirect(route('droguerias.index'));
    }

    /**
     * Remove the specified droguerias from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $droguerias = $this->drogueriasRepository->find($id);

        if (empty($droguerias)) {
            Flash::error('Droguerias not found');

            return redirect(route('droguerias.index'));
        }

        $this->drogueriasRepository->delete($id);

        Flash::success('Droguerias deleted successfully.');

        return redirect(route('droguerias.index'));
    }
}
