<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepaisesAPIRequest;
use App\Http\Requests\API\UpdatepaisesAPIRequest;
use App\Models\paises;
use App\Repositories\paisesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\paisesResource;
use Response;

/**
 * Class paisesController
 * @package App\Http\Controllers\API
 */

class paisesAPIController extends AppBaseController
{
    /** @var  paisesRepository */
    private $paisesRepository;

    public function __construct(paisesRepository $paisesRepo)
    {
        $this->paisesRepository = $paisesRepo;
    }

    /**
     * Display a listing of the paises.
     * GET|HEAD /paises
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $paises = $this->paisesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(paisesResource::collection($paises), 'Paises retrieved successfully');
    }

    /**
     * Store a newly created paises in storage.
     * POST /paises
     *
     * @param CreatepaisesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepaisesAPIRequest $request)
    {
        $input = $request->all();

        $paises = $this->paisesRepository->create($input);

        return $this->sendResponse(new paisesResource($paises), 'Paises saved successfully');
    }

    /**
     * Display the specified paises.
     * GET|HEAD /paises/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return $this->sendError('Paises not found');
        }

        return $this->sendResponse(new paisesResource($paises), 'Paises retrieved successfully');
    }

    /**
     * Update the specified paises in storage.
     * PUT/PATCH /paises/{id}
     *
     * @param int $id
     * @param UpdatepaisesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepaisesAPIRequest $request)
    {
        $input = $request->all();

        /** @var paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return $this->sendError('Paises not found');
        }

        $paises = $this->paisesRepository->update($input, $id);

        return $this->sendResponse(new paisesResource($paises), 'paises updated successfully');
    }

    /**
     * Remove the specified paises from storage.
     * DELETE /paises/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return $this->sendError('Paises not found');
        }

        $paises->delete();

        return $this->sendSuccess('Paises deleted successfully');
    }
}
