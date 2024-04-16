<?php

namespace App\Http\Controllers;

use App\Models\ciudades; 

use App\Http\Requests\CreateindicativosciudadesRequest;
use App\Http\Requests\UpdateindicativosciudadesRequest;
use App\Repositories\indicativosciudadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class indicativosciudadesController extends AppBaseController
{
    /** @var indicativosciudadesRepository $indicativosciudadesRepository*/
    private $indicativosciudadesRepository;

    public function __construct(indicativosciudadesRepository $indicativosciudadesRepo)
    {
        $this->indicativosciudadesRepository = $indicativosciudadesRepo;
    }

    /**
     * Display a listing of the indicativosciudades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->all();
        $ciudades = ciudades::pluck('CiuCiudad', 'id');

        return view('indicativosciudades.index')
            ->with('indicativosciudades', $indicativosciudades)
            ->with('ciudades', $ciudades);
    }

    /**
     * Show the form for creating a new indicativosciudades.
     *
     * @return Response
     */
    public function create()
    {
        $ciudades = ciudades::pluck('CiuCiudad', 'id');
        return view('indicativosciudades.create')
        ->with('ciudades', $ciudades);
    }

    /**
     * Store a newly created indicativosciudades in storage.
     *
     * @param CreateindicativosciudadesRequest $request
     *
     * @return Response
     */
    public function store(CreateindicativosciudadesRequest $request)
    {
        $input = $request->all();

        $indicativosciudades = $this->indicativosciudadesRepository->create($input);

        Flash::success('Indicativosciudades saved successfully.');

        return redirect(route('indicativosciudades.index'));
    }

    /**
     * Display the specified indicativosciudades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            Flash::error('Indicativosciudades not found');

            return redirect(route('indicativosciudades.index'));
        }

        return view('indicativosciudades.show')->with('indicativosciudades', $indicativosciudades);
    }

    /**
     * Show the form for editing the specified indicativosciudades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            Flash::error('Indicativosciudades not found');

            return redirect(route('indicativosciudades.index'));
        }

        return view('indicativosciudades.edit')->with('indicativosciudades', $indicativosciudades);
    }

    /**
     * Update the specified indicativosciudades in storage.
     *
     * @param int $id
     * @param UpdateindicativosciudadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateindicativosciudadesRequest $request)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            Flash::error('Indicativosciudades not found');

            return redirect(route('indicativosciudades.index'));
        }

        $indicativosciudades = $this->indicativosciudadesRepository->update($request->all(), $id);

        Flash::success('Indicativosciudades updated successfully.');

        return redirect(route('indicativosciudades.index'));
    }

    /**
     * Remove the specified indicativosciudades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            Flash::error('Indicativosciudades not found');

            return redirect(route('indicativosciudades.index'));
        }

        $this->indicativosciudadesRepository->delete($id);

        Flash::success('Indicativosciudades deleted successfully.');

        return redirect(route('indicativosciudades.index'));
    }
}
