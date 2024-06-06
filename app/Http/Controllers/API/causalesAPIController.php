<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecausalesAPIRequest;
use App\Http\Requests\API\UpdatecausalesAPIRequest;
use App\Models\causales;
use App\Repositories\causalesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\causalesResource;
use Response;

/**
 * Class causalesController
 * @package App\Http\Controllers\API
 */

class causalesAPIController extends AppBaseController
{
    /** @var  causalesRepository */
    private $causalesRepository;

    public function __construct(causalesRepository $causalesRepo)
    {
        $this->causalesRepository = $causalesRepo;
    }

    /**
     * Display a listing of the causales.
     * GET|HEAD /causales
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $causales = $this->causalesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(causalesResource::collection($causales), 'Causales retrieved successfully');
    }

    /**
     * Store a newly created causales in storage.
     * POST /causales
     *
     * @param CreatecausalesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecausalesAPIRequest $request)
    {
        $input = $request->all();

        $causales = $this->causalesRepository->create($input);

        return $this->sendResponse(new causalesResource($causales), 'Causales saved successfully');
    }

    /**
     * Display the specified causales.
     * GET|HEAD /causales/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var causales $causales */
        $causales = $this->causalesRepository->find($id);

        if (empty($causales)) {
            return $this->sendError('Causales not found');
        }

        return $this->sendResponse(new causalesResource($causales), 'Causales retrieved successfully');
    }

    /**
     * Update the specified causales in storage.
     * PUT/PATCH /causales/{id}
     *
     * @param int $id
     * @param UpdatecausalesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecausalesAPIRequest $request)
    {
        $input = $request->all();

        /** @var causales $causales */
        $causales = $this->causalesRepository->find($id);

        if (empty($causales)) {
            return $this->sendError('Causales not found');
        }

        $causales = $this->causalesRepository->update($input, $id);

        return $this->sendResponse(new causalesResource($causales), 'causales updated successfully');
    }

    /**
     * Remove the specified causales from storage.
     * DELETE /causales/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var causales $causales */
        $causales = $this->causalesRepository->find($id);

        if (empty($causales)) {
            return $this->sendError('Causales not found');
        }

        $causales->delete();

        return $this->sendSuccess('Causales deleted successfully');
    }
}
