<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetipostelefonosAPIRequest;
use App\Http\Requests\API\UpdatetipostelefonosAPIRequest;
use App\Models\tipostelefonos;
use App\Repositories\tipostelefonosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\tipostelefonosResource;
use Response;

/**
 * Class tipostelefonosController
 * @package App\Http\Controllers\API
 */

class tipostelefonosAPIController extends AppBaseController
{
    /** @var  tipostelefonosRepository */
    private $tipostelefonosRepository;

    public function __construct(tipostelefonosRepository $tipostelefonosRepo)
    {
        $this->tipostelefonosRepository = $tipostelefonosRepo;
    }

    /**
     * Display a listing of the tipostelefonos.
     * GET|HEAD /tipostelefonos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipostelefonos = $this->tipostelefonosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(tipostelefonosResource::collection($tipostelefonos), 'Tipostelefonos retrieved successfully');
    }

    /**
     * Store a newly created tipostelefonos in storage.
     * POST /tipostelefonos
     *
     * @param CreatetipostelefonosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetipostelefonosAPIRequest $request)
    {
        $input = $request->all();

        $tipostelefonos = $this->tipostelefonosRepository->create($input);

        return $this->sendResponse(new tipostelefonosResource($tipostelefonos), 'Tipostelefonos saved successfully');
    }

    /**
     * Display the specified tipostelefonos.
     * GET|HEAD /tipostelefonos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tipostelefonos $tipostelefonos */
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            return $this->sendError('Tipostelefonos not found');
        }

        return $this->sendResponse(new tipostelefonosResource($tipostelefonos), 'Tipostelefonos retrieved successfully');
    }

    /**
     * Update the specified tipostelefonos in storage.
     * PUT/PATCH /tipostelefonos/{id}
     *
     * @param int $id
     * @param UpdatetipostelefonosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipostelefonosAPIRequest $request)
    {
        $input = $request->all();

        /** @var tipostelefonos $tipostelefonos */
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            return $this->sendError('Tipostelefonos not found');
        }

        $tipostelefonos = $this->tipostelefonosRepository->update($input, $id);

        return $this->sendResponse(new tipostelefonosResource($tipostelefonos), 'tipostelefonos updated successfully');
    }

    /**
     * Remove the specified tipostelefonos from storage.
     * DELETE /tipostelefonos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tipostelefonos $tipostelefonos */
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            return $this->sendError('Tipostelefonos not found');
        }

        $tipostelefonos->delete();

        return $this->sendSuccess('Tipostelefonos deleted successfully');
    }
}
