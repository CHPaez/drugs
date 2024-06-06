<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateestadostipificacionAPIRequest;
use App\Http\Requests\API\UpdateestadostipificacionAPIRequest;
use App\Models\estadostipificacion;
use App\Repositories\estadostipificacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\estadostipificacionResource;
use Response;

/**
 * Class estadostipificacionController
 * @package App\Http\Controllers\API
 */

class estadostipificacionAPIController extends AppBaseController
{
    /** @var  estadostipificacionRepository */
    private $estadostipificacionRepository;

    public function __construct(estadostipificacionRepository $estadostipificacionRepo)
    {
        $this->estadostipificacionRepository = $estadostipificacionRepo;
    }

    /**
     * Display a listing of the estadostipificacion.
     * GET|HEAD /estadostipificacions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $estadostipificacions = $this->estadostipificacionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(estadostipificacionResource::collection($estadostipificacions), 'Estadostipificacions retrieved successfully');
    }

    /**
     * Store a newly created estadostipificacion in storage.
     * POST /estadostipificacions
     *
     * @param CreateestadostipificacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateestadostipificacionAPIRequest $request)
    {
        $input = $request->all();

        $estadostipificacion = $this->estadostipificacionRepository->create($input);

        return $this->sendResponse(new estadostipificacionResource($estadostipificacion), 'Estadostipificacion saved successfully');
    }

    /**
     * Display the specified estadostipificacion.
     * GET|HEAD /estadostipificacions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var estadostipificacion $estadostipificacion */
        $estadostipificacion = $this->estadostipificacionRepository->find($id);

        if (empty($estadostipificacion)) {
            return $this->sendError('Estadostipificacion not found');
        }

        return $this->sendResponse(new estadostipificacionResource($estadostipificacion), 'Estadostipificacion retrieved successfully');
    }

    /**
     * Update the specified estadostipificacion in storage.
     * PUT/PATCH /estadostipificacions/{id}
     *
     * @param int $id
     * @param UpdateestadostipificacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestadostipificacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var estadostipificacion $estadostipificacion */
        $estadostipificacion = $this->estadostipificacionRepository->find($id);

        if (empty($estadostipificacion)) {
            return $this->sendError('Estadostipificacion not found');
        }

        $estadostipificacion = $this->estadostipificacionRepository->update($input, $id);

        return $this->sendResponse(new estadostipificacionResource($estadostipificacion), 'estadostipificacion updated successfully');
    }

    /**
     * Remove the specified estadostipificacion from storage.
     * DELETE /estadostipificacions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var estadostipificacion $estadostipificacion */
        $estadostipificacion = $this->estadostipificacionRepository->find($id);

        if (empty($estadostipificacion)) {
            return $this->sendError('Estadostipificacion not found');
        }

        $estadostipificacion->delete();

        return $this->sendSuccess('Estadostipificacion deleted successfully');
    }
}
