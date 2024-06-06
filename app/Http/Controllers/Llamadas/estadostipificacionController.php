<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreateestadostipificacionRequest;
use App\Http\Requests\UpdateestadostipificacionRequest;
use App\Repositories\estadostipificacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class estadostipificacionController extends AppBaseController
{
    /** @var estadostipificacionRepository $estadostipificacionRepository*/
    private $estadostipificacionRepository;

    public function __construct(estadostipificacionRepository $estadostipificacionRepo)
    {
        $this->estadostipificacionRepository = $estadostipificacionRepo;
    }

    /**
     * Display a listing of the estadostipificacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estadostipificacions = $this->estadostipificacionRepository->all();

        return view('llamadas.estadostipificacions.index')
            ->with('estadostipificacions', $estadostipificacions);
    }

    /**
     * Show the form for creating a new estadostipificacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.estadostipificacions.create');
    }

    /**
     * Store a newly created estadostipificacion in storage.
     *
     * @param CreateestadostipificacionRequest $request
     *
     * @return Response
     */
    public function store(CreateestadostipificacionRequest $request)
    {
        $input = $request->all();

        $estadostipificacion = $this->estadostipificacionRepository->create($input);

        Flash::success('Estadostipificacion saved successfully.');

        return redirect(route('llamadas.estadostipificacions.index'));
    }

    /**
     * Display the specified estadostipificacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadostipificacion = $this->estadostipificacionRepository->find($id);

        if (empty($estadostipificacion)) {
            Flash::error('Estadostipificacion not found');

            return redirect(route('estadostipificacions.index'));
        }

        return view('llamadas.estadostipificacions.show')->with('estadostipificacion', $estadostipificacion);
    }

    /**
     * Show the form for editing the specified estadostipificacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadostipificacion = $this->estadostipificacionRepository->find($id);

        if (empty($estadostipificacion)) {
            Flash::error('Estadostipificacion not found');

            return redirect(route('estadostipificacions.index'));
        }

        return view('llamadas.estadostipificacions.edit')->with('estadostipificacion', $estadostipificacion);
    }

    /**
     * Update the specified estadostipificacion in storage.
     *
     * @param int $id
     * @param UpdateestadostipificacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestadostipificacionRequest $request)
    {
        $estadostipificacion = $this->estadostipificacionRepository->find($id);

        if (empty($estadostipificacion)) {
            Flash::error('Estadostipificacion not found');

            return redirect(route('estadostipificacions.index'));
        }

        $estadostipificacion = $this->estadostipificacionRepository->update($request->all(), $id);

        Flash::success('Estadostipificacion updated successfully.');

        return redirect(route('estadostipificacions.index'));
    }

    /**
     * Remove the specified estadostipificacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadostipificacion = $this->estadostipificacionRepository->find($id);

        if (empty($estadostipificacion)) {
            Flash::error('Estadostipificacion not found');

            return redirect(route('estadostipificacions.index'));
        }

        $this->estadostipificacionRepository->delete($id);

        Flash::success('Estadostipificacion deleted successfully.');

        return redirect(route('estadostipificacions.index'));
    }
}
