<?php

namespace App\Http\Controllers;

use App\Models\paises;

use App\Http\Requests\CreatedepartamentosRequest;
use App\Http\Requests\UpdatedepartamentosRequest;
use App\Repositories\departamentosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class departamentosController extends AppBaseController
{
    /** @var departamentosRepository $departamentosRepository*/
    private $departamentosRepository;

    public function __construct(departamentosRepository $departamentosRepo)
    {
        $this->departamentosRepository = $departamentosRepo;
    }

    /**
     * Display a listing of the departamentos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $departamentos = $this->departamentosRepository->all();
        

        return view('departamentos.index') 
            ->with('departamentos', $departamentos);
    }

    /**
     * Show the form for creating a new departamentos.
     *
     * @return Response 
     */
    public function create()
    {
        $paises = paises::pluck('PaNombre', 'id');

        return view('departamentos.create')
        ->with('paises', $paises);
    }

    /**
     * Store a newly created departamentos in storage.
     *
     * @param CreatedepartamentosRequest $request
     *
     * @return Response
     */
    public function store(CreatedepartamentosRequest $request)
    {
        $input = $request->all();

        $departamentos = $this->departamentosRepository->create($input);

        Flash::success('Departamentos saved successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Display the specified departamentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.show')->with('departamentos', $departamentos);
    }

    /**
     * Show the form for editing the specified departamentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.edit')->with('departamentos', $departamentos);
    }

    /**
     * Update the specified departamentos in storage.
     *
     * @param int $id
     * @param UpdatedepartamentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedepartamentosRequest $request)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        $departamentos = $this->departamentosRepository->update($request->all(), $id);

        Flash::success('Departamentos updated successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified departamentos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        $this->departamentosRepository->delete($id);

        Flash::success('Departamentos deleted successfully.');

        return redirect(route('departamentos.index'));
    }
}
