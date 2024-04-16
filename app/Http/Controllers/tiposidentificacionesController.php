<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetiposidentificacionesRequest;
use App\Http\Requests\UpdatetiposidentificacionesRequest;
use App\Repositories\tiposidentificacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tiposidentificacionesController extends AppBaseController
{
    /** @var tiposidentificacionesRepository $tiposidentificacionesRepository*/
    private $tiposidentificacionesRepository;

    public function __construct(tiposidentificacionesRepository $tiposidentificacionesRepo)
    {
        $this->tiposidentificacionesRepository = $tiposidentificacionesRepo;
    }

    /**
     * Display a listing of the tiposidentificaciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->all();

        return view('tiposidentificaciones.index')
            ->with('tiposidentificaciones', $tiposidentificaciones);
    }

    /**
     * Show the form for creating a new tiposidentificaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('tiposidentificaciones.create');
    }

    /**
     * Store a newly created tiposidentificaciones in storage.
     *
     * @param CreatetiposidentificacionesRequest $request
     *
     * @return Response
     */
    public function store(CreatetiposidentificacionesRequest $request)
    {
        $input = $request->all();

        $tiposidentificaciones = $this->tiposidentificacionesRepository->create($input);

        Flash::success('Tiposidentificaciones saved successfully.');

        return redirect(route('tiposidentificaciones.index'));
    }

    /**
     * Display the specified tiposidentificaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            Flash::error('Tiposidentificaciones not found');

            return redirect(route('tiposidentificaciones.index'));
        }

        return view('tiposidentificaciones.show')->with('tiposidentificaciones', $tiposidentificaciones);
    }

    /**
     * Show the form for editing the specified tiposidentificaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            Flash::error('Tiposidentificaciones not found');

            return redirect(route('tiposidentificaciones.index'));
        }

        return view('tiposidentificaciones.edit')->with('tiposidentificaciones', $tiposidentificaciones);
    }

    /**
     * Update the specified tiposidentificaciones in storage.
     *
     * @param int $id
     * @param UpdatetiposidentificacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiposidentificacionesRequest $request)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            Flash::error('Tiposidentificaciones not found');

            return redirect(route('tiposidentificaciones.index'));
        }

        $tiposidentificaciones = $this->tiposidentificacionesRepository->update($request->all(), $id);

        Flash::success('Tiposidentificaciones updated successfully.');

        return redirect(route('tiposidentificaciones.index'));
    }

    /**
     * Remove the specified tiposidentificaciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            Flash::error('Tiposidentificaciones not found');

            return redirect(route('tiposidentificaciones.index'));
        }

        $this->tiposidentificacionesRepository->delete($id);

        Flash::success('Tiposidentificaciones deleted successfully.');

        return redirect(route('tiposidentificaciones.index'));
    }
}
