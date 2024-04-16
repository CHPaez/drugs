<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedrogueriasAPIRequest;
use App\Http\Requests\API\UpdatedrogueriasAPIRequest;
use App\Models\droguerias;
use App\Repositories\drogueriasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\drogueriasResource;
use Response;

/**
 * Class drogueriasController
 * @package App\Http\Controllers\API
 */

class drogueriasAPIController extends AppBaseController
{
    /** @var  drogueriasRepository */
    private $drogueriasRepository;

    public function __construct(drogueriasRepository $drogueriasRepo)
    {
        $this->drogueriasRepository = $drogueriasRepo;
    }

    /**
     * Display a listing of the droguerias.
     * GET|HEAD /droguerias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $droguerias = $this->drogueriasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(drogueriasResource::collection($droguerias), 'Droguerias retrieved successfully');
    }

    /**
     * Store a newly created droguerias in storage.
     * POST /droguerias
     *
     * @param CreatedrogueriasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedrogueriasAPIRequest $request)
    {
        $input = $request->all();

        $droguerias = $this->drogueriasRepository->create($input);

        return $this->sendResponse(new drogueriasResource($droguerias), 'Droguerias saved successfully');
    }

    /**
     * Display the specified droguerias.
     * GET|HEAD /droguerias/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var droguerias $droguerias */
        $droguerias = $this->drogueriasRepository->find($id);

        if (empty($droguerias)) {
            return $this->sendError('Droguerias not found');
        }

        return $this->sendResponse(new drogueriasResource($droguerias), 'Droguerias retrieved successfully');
    }

    /**
     * Update the specified droguerias in storage.
     * PUT/PATCH /droguerias/{id}
     *
     * @param int $id
     * @param UpdatedrogueriasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedrogueriasAPIRequest $request)
    {
        $input = $request->all();

        /** @var droguerias $droguerias */
        $droguerias = $this->drogueriasRepository->find($id);

        if (empty($droguerias)) {
            return $this->sendError('Droguerias not found');
        }

        $droguerias = $this->drogueriasRepository->update($input, $id);

        return $this->sendResponse(new drogueriasResource($droguerias), 'droguerias updated successfully');
    }

    /**
     * Remove the specified droguerias from storage.
     * DELETE /droguerias/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var droguerias $droguerias */
        $droguerias = $this->drogueriasRepository->find($id);

        if (empty($droguerias)) {
            return $this->sendError('Droguerias not found');
        }

        $droguerias->delete();

        return $this->sendSuccess('Droguerias deleted successfully');
    }
}
