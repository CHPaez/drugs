<?php

namespace App\Http\Controllers\Paises;

use App\Models\departamentos;

use App\Http\Requests\CreateciudadesRequest;
use App\Http\Requests\UpdateciudadesRequest;
use App\Repositories\ciudadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ciudadesController extends AppBaseController
{
    /** @var ciudadesRepository $ciudadesRepository*/
    private $ciudadesRepository;

    public function __construct(ciudadesRepository $ciudadesRepo)
    {
        $this->ciudadesRepository = $ciudadesRepo;
    }

    /**
     * Display a listing of the ciudades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ciudades = $this->ciudadesRepository->all();

        return view('paises.ciudades.index')
            ->with('ciudades', $ciudades);
    }

    /**
     * Show the form for creating a new ciudades.
     *
     * @return Response
     */
    public function create()
    {
        $departamentos = departamentos::pluck('DepDepartamento', 'id');

        return view('paises.ciudades.create')
        ->with('departamentos', $departamentos);
    }

    /**
     * Store a newly created ciudades in storage.
     *
     * @param CreateciudadesRequest $request
     *
     * @return Response
     */
    public function store(CreateciudadesRequest $request)
    {
        $input = $request->all();

        $ciudades = $this->ciudadesRepository->create($input);

        Flash::success('Ciudades saved successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Display the specified ciudades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ciudades = $this->ciudadesRepository->find($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        return view('paises.ciudades.show')->with('ciudades', $ciudades);
    }

    /**
     * Show the form for editing the specified ciudades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ciudades = $this->ciudadesRepository->find($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        return view('paises.ciudades.edit')->with('ciudades', $ciudades);
    }

    /**
     * Update the specified ciudades in storage.
     *
     * @param int $id
     * @param UpdateciudadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateciudadesRequest $request)
    {
        $ciudades = $this->ciudadesRepository->find($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        $ciudades = $this->ciudadesRepository->update($request->all(), $id);

        Flash::success('Ciudades updated successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Remove the specified ciudades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ciudades = $this->ciudadesRepository->find($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        $this->ciudadesRepository->delete($id);

        Flash::success('Ciudades deleted successfully.');

        return redirect(route('ciudades.index'));
    }
}
