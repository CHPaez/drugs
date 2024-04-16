<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetiposasociadosAPIRequest;
use App\Http\Requests\API\UpdatetiposasociadosAPIRequest;
use App\Models\tiposasociados;
use App\Repositories\tiposasociadosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\tiposasociadosResource;
use Response;

/**
 * Class tiposasociadosController
 * @package App\Http\Controllers\API
 */

class tiposasociadosAPIController extends AppBaseController
{
    /** @var  tiposasociadosRepository */
    private $tiposasociadosRepository;

    public function __construct(tiposasociadosRepository $tiposasociadosRepo)
    {
        $this->tiposasociadosRepository = $tiposasociadosRepo;
    }

    /**
     * Display a listing of the tiposasociados.
     * GET|HEAD /tiposasociados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tiposasociados = $this->tiposasociadosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(tiposasociadosResource::collection($tiposasociados), 'Tiposasociados retrieved successfully');
    }

    /**
     * Store a newly created tiposasociados in storage.
     * POST /tiposasociados
     *
     * @param CreatetiposasociadosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetiposasociadosAPIRequest $request)
    {
        $input = $request->all();

        $tiposasociados = $this->tiposasociadosRepository->create($input);

        return $this->sendResponse(new tiposasociadosResource($tiposasociados), 'Tiposasociados saved successfully');
    }

    /**
     * Display the specified tiposasociados.
     * GET|HEAD /tiposasociados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tiposasociados $tiposasociados */
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            return $this->sendError('Tiposasociados not found');
        }

        return $this->sendResponse(new tiposasociadosResource($tiposasociados), 'Tiposasociados retrieved successfully');
    }

    /**
     * Update the specified tiposasociados in storage.
     * PUT/PATCH /tiposasociados/{id}
     *
     * @param int $id
     * @param UpdatetiposasociadosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiposasociadosAPIRequest $request)
    {
        $input = $request->all();

        /** @var tiposasociados $tiposasociados */
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            return $this->sendError('Tiposasociados not found');
        }

        $tiposasociados = $this->tiposasociadosRepository->update($input, $id);

        return $this->sendResponse(new tiposasociadosResource($tiposasociados), 'tiposasociados updated successfully');
    }

    /**
     * Remove the specified tiposasociados from storage.
     * DELETE /tiposasociados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tiposasociados $tiposasociados */
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            return $this->sendError('Tiposasociados not found');
        }

        $tiposasociados->delete();

        return $this->sendSuccess('Tiposasociados deleted successfully');
    }
}
