<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetiposdrogueriasAPIRequest;
use App\Http\Requests\API\UpdatetiposdrogueriasAPIRequest;
use App\Models\tiposdroguerias;
use App\Repositories\tiposdrogueriasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\tiposdrogueriasResource;
use Response;

/**
 * Class tiposdrogueriasController
 * @package App\Http\Controllers\API
 */

class tiposdrogueriasAPIController extends AppBaseController
{
    /** @var  tiposdrogueriasRepository */
    private $tiposdrogueriasRepository;

    public function __construct(tiposdrogueriasRepository $tiposdrogueriasRepo)
    {
        $this->tiposdrogueriasRepository = $tiposdrogueriasRepo;
    }

    /**
     * Display a listing of the tiposdroguerias.
     * GET|HEAD /tiposdroguerias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tiposdroguerias = $this->tiposdrogueriasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(tiposdrogueriasResource::collection($tiposdroguerias), 'Tiposdroguerias retrieved successfully');
    }

    /**
     * Store a newly created tiposdroguerias in storage.
     * POST /tiposdroguerias
     *
     * @param CreatetiposdrogueriasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetiposdrogueriasAPIRequest $request)
    {
        $input = $request->all();

        $tiposdroguerias = $this->tiposdrogueriasRepository->create($input);

        return $this->sendResponse(new tiposdrogueriasResource($tiposdroguerias), 'Tiposdroguerias saved successfully');
    }

    /**
     * Display the specified tiposdroguerias.
     * GET|HEAD /tiposdroguerias/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tiposdroguerias $tiposdroguerias */
        $tiposdroguerias = $this->tiposdrogueriasRepository->find($id);

        if (empty($tiposdroguerias)) {
            return $this->sendError('Tiposdroguerias not found');
        }

        return $this->sendResponse(new tiposdrogueriasResource($tiposdroguerias), 'Tiposdroguerias retrieved successfully');
    }

    /**
     * Update the specified tiposdroguerias in storage.
     * PUT/PATCH /tiposdroguerias/{id}
     *
     * @param int $id
     * @param UpdatetiposdrogueriasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiposdrogueriasAPIRequest $request)
    {
        $input = $request->all();

        /** @var tiposdroguerias $tiposdroguerias */
        $tiposdroguerias = $this->tiposdrogueriasRepository->find($id);

        if (empty($tiposdroguerias)) {
            return $this->sendError('Tiposdroguerias not found');
        }

        $tiposdroguerias = $this->tiposdrogueriasRepository->update($input, $id);

        return $this->sendResponse(new tiposdrogueriasResource($tiposdroguerias), 'tiposdroguerias updated successfully');
    }

    /**
     * Remove the specified tiposdroguerias from storage.
     * DELETE /tiposdroguerias/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tiposdroguerias $tiposdroguerias */
        $tiposdroguerias = $this->tiposdrogueriasRepository->find($id);

        if (empty($tiposdroguerias)) {
            return $this->sendError('Tiposdroguerias not found');
        }

        $tiposdroguerias->delete();

        return $this->sendSuccess('Tiposdroguerias deleted successfully');
    }
}
