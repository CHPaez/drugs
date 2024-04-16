<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedepartamentosAPIRequest;
use App\Http\Requests\API\UpdatedepartamentosAPIRequest;
use App\Models\departamentos;
use App\Repositories\departamentosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\departamentosResource;
use Response;

/**
 * Class departamentosController
 * @package App\Http\Controllers\API
 */

class departamentosAPIController extends AppBaseController
{
    /** @var  departamentosRepository */
    private $departamentosRepository;

    public function __construct(departamentosRepository $departamentosRepo)
    {
        $this->departamentosRepository = $departamentosRepo;
    }

    /**
     * Display a listing of the departamentos.
     * GET|HEAD /departamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $departamentos = $this->departamentosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(departamentosResource::collection($departamentos), 'Departamentos retrieved successfully');
    }

    /**
     * Store a newly created departamentos in storage.
     * POST /departamentos
     *
     * @param CreatedepartamentosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedepartamentosAPIRequest $request)
    {
        $input = $request->all();

        $departamentos = $this->departamentosRepository->create($input);

        return $this->sendResponse(new departamentosResource($departamentos), 'Departamentos saved successfully');
    }

    /**
     * Display the specified departamentos.
     * GET|HEAD /departamentos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError('Departamentos not found');
        }

        return $this->sendResponse(new departamentosResource($departamentos), 'Departamentos retrieved successfully');
    }

    /**
     * Update the specified departamentos in storage.
     * PUT/PATCH /departamentos/{id}
     *
     * @param int $id
     * @param UpdatedepartamentosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedepartamentosAPIRequest $request)
    {
        $input = $request->all();

        /** @var departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError('Departamentos not found');
        }

        $departamentos = $this->departamentosRepository->update($input, $id);

        return $this->sendResponse(new departamentosResource($departamentos), 'departamentos updated successfully');
    }

    /**
     * Remove the specified departamentos from storage.
     * DELETE /departamentos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError('Departamentos not found');
        }

        $departamentos->delete();

        return $this->sendSuccess('Departamentos deleted successfully');
    }
}
