<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetelefonopersonasAPIRequest;
use App\Http\Requests\API\UpdatetelefonopersonasAPIRequest;
use App\Models\telefonopersonas;
use App\Repositories\telefonopersonasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\telefonopersonasResource;
use Response;

/**
 * Class telefonopersonasController
 * @package App\Http\Controllers\API
 */

class telefonopersonasAPIController extends AppBaseController
{
    /** @var  telefonopersonasRepository */
    private $telefonopersonasRepository;

    public function __construct(telefonopersonasRepository $telefonopersonasRepo)
    {
        $this->telefonopersonasRepository = $telefonopersonasRepo;
    }

    /**
     * Display a listing of the telefonopersonas.
     * GET|HEAD /telefonopersonas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $telefonopersonas = $this->telefonopersonasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(telefonopersonasResource::collection($telefonopersonas), 'Telefonopersonas retrieved successfully');
    }

    /**
     * Store a newly created telefonopersonas in storage.
     * POST /telefonopersonas
     *
     * @param CreatetelefonopersonasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetelefonopersonasAPIRequest $request)
    {
        $input = $request->all();

        $telefonopersonas = $this->telefonopersonasRepository->create($input);

        return $this->sendResponse(new telefonopersonasResource($telefonopersonas), 'Telefonopersonas saved successfully');
    }

    /**
     * Display the specified telefonopersonas.
     * GET|HEAD /telefonopersonas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var telefonopersonas $telefonopersonas */
        $telefonopersonas = $this->telefonopersonasRepository->find($id);

        if (empty($telefonopersonas)) {
            return $this->sendError('Telefonopersonas not found');
        }

        return $this->sendResponse(new telefonopersonasResource($telefonopersonas), 'Telefonopersonas retrieved successfully');
    }

    /**
     * Update the specified telefonopersonas in storage.
     * PUT/PATCH /telefonopersonas/{id}
     *
     * @param int $id
     * @param UpdatetelefonopersonasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetelefonopersonasAPIRequest $request)
    {
        $input = $request->all();

        /** @var telefonopersonas $telefonopersonas */
        $telefonopersonas = $this->telefonopersonasRepository->find($id);

        if (empty($telefonopersonas)) {
            return $this->sendError('Telefonopersonas not found');
        }

        $telefonopersonas = $this->telefonopersonasRepository->update($input, $id);

        return $this->sendResponse(new telefonopersonasResource($telefonopersonas), 'telefonopersonas updated successfully');
    }

    /**
     * Remove the specified telefonopersonas from storage.
     * DELETE /telefonopersonas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var telefonopersonas $telefonopersonas */
        $telefonopersonas = $this->telefonopersonasRepository->find($id);

        if (empty($telefonopersonas)) {
            return $this->sendError('Telefonopersonas not found');
        }

        $telefonopersonas->delete();

        return $this->sendSuccess('Telefonopersonas deleted successfully');
    }
}
