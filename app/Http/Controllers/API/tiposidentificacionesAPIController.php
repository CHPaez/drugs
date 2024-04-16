<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetiposidentificacionesAPIRequest;
use App\Http\Requests\API\UpdatetiposidentificacionesAPIRequest;
use App\Models\tiposidentificaciones;
use App\Repositories\tiposidentificacionesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\tiposidentificacionesResource;
use Response;

/**
 * Class tiposidentificacionesController
 * @package App\Http\Controllers\API
 */

class tiposidentificacionesAPIController extends AppBaseController
{
    /** @var  tiposidentificacionesRepository */
    private $tiposidentificacionesRepository;

    public function __construct(tiposidentificacionesRepository $tiposidentificacionesRepo)
    {
        $this->tiposidentificacionesRepository = $tiposidentificacionesRepo;
    }

    /**
     * Display a listing of the tiposidentificaciones.
     * GET|HEAD /tiposidentificaciones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tiposidentificaciones = $this->tiposidentificacionesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(tiposidentificacionesResource::collection($tiposidentificaciones), 'Tiposidentificaciones retrieved successfully');
    }

    /**
     * Store a newly created tiposidentificaciones in storage.
     * POST /tiposidentificaciones
     *
     * @param CreatetiposidentificacionesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetiposidentificacionesAPIRequest $request)
    {
        $input = $request->all();

        $tiposidentificaciones = $this->tiposidentificacionesRepository->create($input);

        return $this->sendResponse(new tiposidentificacionesResource($tiposidentificaciones), 'Tiposidentificaciones saved successfully');
    }

    /**
     * Display the specified tiposidentificaciones.
     * GET|HEAD /tiposidentificaciones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tiposidentificaciones $tiposidentificaciones */
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            return $this->sendError('Tiposidentificaciones not found');
        }

        return $this->sendResponse(new tiposidentificacionesResource($tiposidentificaciones), 'Tiposidentificaciones retrieved successfully');
    }

    /**
     * Update the specified tiposidentificaciones in storage.
     * PUT/PATCH /tiposidentificaciones/{id}
     *
     * @param int $id
     * @param UpdatetiposidentificacionesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiposidentificacionesAPIRequest $request)
    {
        $input = $request->all();

        /** @var tiposidentificaciones $tiposidentificaciones */
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            return $this->sendError('Tiposidentificaciones not found');
        }

        $tiposidentificaciones = $this->tiposidentificacionesRepository->update($input, $id);

        return $this->sendResponse(new tiposidentificacionesResource($tiposidentificaciones), 'tiposidentificaciones updated successfully');
    }

    /**
     * Remove the specified tiposidentificaciones from storage.
     * DELETE /tiposidentificaciones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tiposidentificaciones $tiposidentificaciones */
        $tiposidentificaciones = $this->tiposidentificacionesRepository->find($id);

        if (empty($tiposidentificaciones)) {
            return $this->sendError('Tiposidentificaciones not found');
        }

        $tiposidentificaciones->delete();

        return $this->sendSuccess('Tiposidentificaciones deleted successfully');
    }
}
