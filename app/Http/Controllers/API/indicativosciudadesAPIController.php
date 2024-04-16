<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateindicativosciudadesAPIRequest;
use App\Http\Requests\API\UpdateindicativosciudadesAPIRequest;
use App\Models\indicativosciudades;
use App\Repositories\indicativosciudadesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\indicativosciudadesResource;
use Response;

/**
 * Class indicativosciudadesController
 * @package App\Http\Controllers\API
 */

class indicativosciudadesAPIController extends AppBaseController
{
    /** @var  indicativosciudadesRepository */
    private $indicativosciudadesRepository;

    public function __construct(indicativosciudadesRepository $indicativosciudadesRepo)
    {
        $this->indicativosciudadesRepository = $indicativosciudadesRepo;
    }

    /**
     * Display a listing of the indicativosciudades.
     * GET|HEAD /indicativosciudades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $indicativosciudades = $this->indicativosciudadesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(indicativosciudadesResource::collection($indicativosciudades), 'Indicativosciudades retrieved successfully');
    }

    /**
     * Store a newly created indicativosciudades in storage.
     * POST /indicativosciudades
     *
     * @param CreateindicativosciudadesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateindicativosciudadesAPIRequest $request)
    {
        $input = $request->all();

        $indicativosciudades = $this->indicativosciudadesRepository->create($input);

        return $this->sendResponse(new indicativosciudadesResource($indicativosciudades), 'Indicativosciudades saved successfully');
    }

    /**
     * Display the specified indicativosciudades.
     * GET|HEAD /indicativosciudades/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var indicativosciudades $indicativosciudades */
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            return $this->sendError('Indicativosciudades not found');
        }

        return $this->sendResponse(new indicativosciudadesResource($indicativosciudades), 'Indicativosciudades retrieved successfully');
    }

    /**
     * Update the specified indicativosciudades in storage.
     * PUT/PATCH /indicativosciudades/{id}
     *
     * @param int $id
     * @param UpdateindicativosciudadesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateindicativosciudadesAPIRequest $request)
    {
        $input = $request->all();

        /** @var indicativosciudades $indicativosciudades */
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            return $this->sendError('Indicativosciudades not found');
        }

        $indicativosciudades = $this->indicativosciudadesRepository->update($input, $id);

        return $this->sendResponse(new indicativosciudadesResource($indicativosciudades), 'indicativosciudades updated successfully');
    }

    /**
     * Remove the specified indicativosciudades from storage.
     * DELETE /indicativosciudades/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var indicativosciudades $indicativosciudades */
        $indicativosciudades = $this->indicativosciudadesRepository->find($id);

        if (empty($indicativosciudades)) {
            return $this->sendError('Indicativosciudades not found');
        }

        $indicativosciudades->delete();

        return $this->sendSuccess('Indicativosciudades deleted successfully');
    }
}
