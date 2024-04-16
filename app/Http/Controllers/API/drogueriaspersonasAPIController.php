<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedrogueriaspersonasAPIRequest;
use App\Http\Requests\API\UpdatedrogueriaspersonasAPIRequest;
use App\Models\drogueriaspersonas;
use App\Repositories\drogueriaspersonasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\drogueriaspersonasResource;
use Response;

/**
 * Class drogueriaspersonasController
 * @package App\Http\Controllers\API
 */

class drogueriaspersonasAPIController extends AppBaseController
{
    /** @var  drogueriaspersonasRepository */
    private $drogueriaspersonasRepository;

    public function __construct(drogueriaspersonasRepository $drogueriaspersonasRepo)
    {
        $this->drogueriaspersonasRepository = $drogueriaspersonasRepo;
    }

    /**
     * Display a listing of the drogueriaspersonas.
     * GET|HEAD /drogueriaspersonas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $drogueriaspersonas = $this->drogueriaspersonasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(drogueriaspersonasResource::collection($drogueriaspersonas), 'Drogueriaspersonas retrieved successfully');
    }

    /**
     * Store a newly created drogueriaspersonas in storage.
     * POST /drogueriaspersonas
     *
     * @param CreatedrogueriaspersonasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedrogueriaspersonasAPIRequest $request)
    {
        $input = $request->all();

        $drogueriaspersonas = $this->drogueriaspersonasRepository->create($input);

        return $this->sendResponse(new drogueriaspersonasResource($drogueriaspersonas), 'Drogueriaspersonas saved successfully');
    }

    /**
     * Display the specified drogueriaspersonas.
     * GET|HEAD /drogueriaspersonas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var drogueriaspersonas $drogueriaspersonas */
        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);

        if (empty($drogueriaspersonas)) {
            return $this->sendError('Drogueriaspersonas not found');
        }

        return $this->sendResponse(new drogueriaspersonasResource($drogueriaspersonas), 'Drogueriaspersonas retrieved successfully');
    }

    /**
     * Update the specified drogueriaspersonas in storage.
     * PUT/PATCH /drogueriaspersonas/{id}
     *
     * @param int $id
     * @param UpdatedrogueriaspersonasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedrogueriaspersonasAPIRequest $request)
    {
        $input = $request->all();

        /** @var drogueriaspersonas $drogueriaspersonas */
        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);

        if (empty($drogueriaspersonas)) {
            return $this->sendError('Drogueriaspersonas not found');
        }

        $drogueriaspersonas = $this->drogueriaspersonasRepository->update($input, $id);

        return $this->sendResponse(new drogueriaspersonasResource($drogueriaspersonas), 'drogueriaspersonas updated successfully');
    }

    /**
     * Remove the specified drogueriaspersonas from storage.
     * DELETE /drogueriaspersonas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var drogueriaspersonas $drogueriaspersonas */
        $drogueriaspersonas = $this->drogueriaspersonasRepository->find($id);

        if (empty($drogueriaspersonas)) {
            return $this->sendError('Drogueriaspersonas not found');
        }

        $drogueriaspersonas->delete();

        return $this->sendSuccess('Drogueriaspersonas deleted successfully');
    }
}
