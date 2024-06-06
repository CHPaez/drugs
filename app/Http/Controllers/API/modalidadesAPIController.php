<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemodalidadesAPIRequest;
use App\Http\Requests\API\UpdatemodalidadesAPIRequest;
use App\Models\modalidades;
use App\Repositories\modalidadesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\modalidadesResource;
use Response;

/**
 * Class modalidadesController
 * @package App\Http\Controllers\API
 */

class modalidadesAPIController extends AppBaseController
{
    /** @var  modalidadesRepository */
    private $modalidadesRepository;

    public function __construct(modalidadesRepository $modalidadesRepo)
    {
        $this->modalidadesRepository = $modalidadesRepo;
    }

    /**
     * Display a listing of the modalidades.
     * GET|HEAD /modalidades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $modalidades = $this->modalidadesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(modalidadesResource::collection($modalidades), 'Modalidades retrieved successfully');
    }

    /**
     * Store a newly created modalidades in storage.
     * POST /modalidades
     *
     * @param CreatemodalidadesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemodalidadesAPIRequest $request)
    {
        $input = $request->all();

        $modalidades = $this->modalidadesRepository->create($input);

        return $this->sendResponse(new modalidadesResource($modalidades), 'Modalidades saved successfully');
    }

    /**
     * Display the specified modalidades.
     * GET|HEAD /modalidades/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var modalidades $modalidades */
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            return $this->sendError('Modalidades not found');
        }

        return $this->sendResponse(new modalidadesResource($modalidades), 'Modalidades retrieved successfully');
    }

    /**
     * Update the specified modalidades in storage.
     * PUT/PATCH /modalidades/{id}
     *
     * @param int $id
     * @param UpdatemodalidadesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemodalidadesAPIRequest $request)
    {
        $input = $request->all();

        /** @var modalidades $modalidades */
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            return $this->sendError('Modalidades not found');
        }

        $modalidades = $this->modalidadesRepository->update($input, $id);

        return $this->sendResponse(new modalidadesResource($modalidades), 'modalidades updated successfully');
    }

    /**
     * Remove the specified modalidades from storage.
     * DELETE /modalidades/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var modalidades $modalidades */
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            return $this->sendError('Modalidades not found');
        }

        $modalidades->delete();

        return $this->sendSuccess('Modalidades deleted successfully');
    }
}
