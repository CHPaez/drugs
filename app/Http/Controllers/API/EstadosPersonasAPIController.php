<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateestadospersonasAPIRequest;
use App\Http\Requests\API\UpdateestadospersonasAPIRequest;
use App\Models\estadospersonas;
use App\Repositories\estadospersonasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\estadospersonasResource;
use Response;

/**
 * Class estadospersonasController
 * @package App\Http\Controllers\API
 */

class estadospersonasAPIController extends AppBaseController
{
    /** @var  estadospersonasRepository */
    private $estadospersonasRepository;

    public function __construct(estadospersonasRepository $estadospersonasRepo)
    {
        $this->estadospersonasRepository = $estadospersonasRepo;
    }

    /**
     * Display a listing of the estadospersonas.
     * GET|HEAD /estadospersonas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $estadospersonas = $this->estadospersonasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(estadospersonasResource::collection($estadospersonas), 'Estadospersonas retrieved successfully');
    }

    /**
     * Store a newly created estadospersonas in storage.
     * POST /estadospersonas
     *
     * @param CreateestadospersonasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateestadospersonasAPIRequest $request)
    {
        $input = $request->all();

        $estadospersonas = $this->estadospersonasRepository->create($input);

        return $this->sendResponse(new estadospersonasResource($estadospersonas), 'Estadospersonas saved successfully');
    }

    /**
     * Display the specified estadospersonas.
     * GET|HEAD /estadospersonas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var estadospersonas $estadospersonas */
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            return $this->sendError('Estadospersonas not found');
        }

        return $this->sendResponse(new estadospersonasResource($estadospersonas), 'Estadospersonas retrieved successfully');
    }

    /**
     * Update the specified estadospersonas in storage.
     * PUT/PATCH /estadospersonas/{id}
     *
     * @param int $id
     * @param UpdateestadospersonasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestadospersonasAPIRequest $request)
    {
        $input = $request->all();

        /** @var estadospersonas $estadospersonas */
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            return $this->sendError('Estadospersonas not found');
        }

        $estadospersonas = $this->estadospersonasRepository->update($input, $id);

        return $this->sendResponse(new estadospersonasResource($estadospersonas), 'estadospersonas updated successfully');
    }

    /**
     * Remove the specified estadospersonas from storage.
     * DELETE /estadospersonas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var estadospersonas $estadospersonas */
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            return $this->sendError('Estadospersonas not found');
        }

        $estadospersonas->delete();

        return $this->sendSuccess('Estadospersonas deleted successfully');
    }
}
