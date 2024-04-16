<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateasociadosAPIRequest;
use App\Http\Requests\API\UpdateasociadosAPIRequest;
use App\Models\asociados;
use App\Repositories\asociadosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\asociadosResource;
use Response;

/**
 * Class asociadosController
 * @package App\Http\Controllers\API
 */

class asociadosAPIController extends AppBaseController
{
    /** @var  asociadosRepository */
    private $asociadosRepository;

    public function __construct(asociadosRepository $asociadosRepo)
    {
        $this->asociadosRepository = $asociadosRepo;
    }

    /**
     * Display a listing of the asociados.
     * GET|HEAD /asociados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $asociados = $this->asociadosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(asociadosResource::collection($asociados), 'Asociados retrieved successfully');
    }

    /**
     * Store a newly created asociados in storage.
     * POST /asociados
     *
     * @param CreateasociadosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateasociadosAPIRequest $request)
    {
        $input = $request->all();

        $asociados = $this->asociadosRepository->create($input);

        return $this->sendResponse(new asociadosResource($asociados), 'Asociados saved successfully');
    }

    /**
     * Display the specified asociados.
     * GET|HEAD /asociados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var asociados $asociados */
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            return $this->sendError('Asociados not found');
        }

        return $this->sendResponse(new asociadosResource($asociados), 'Asociados retrieved successfully');
    }

    /**
     * Update the specified asociados in storage.
     * PUT/PATCH /asociados/{id}
     *
     * @param int $id
     * @param UpdateasociadosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateasociadosAPIRequest $request)
    {
        $input = $request->all();

        /** @var asociados $asociados */
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            return $this->sendError('Asociados not found');
        }

        $asociados = $this->asociadosRepository->update($input, $id);

        return $this->sendResponse(new asociadosResource($asociados), 'asociados updated successfully');
    }

    /**
     * Remove the specified asociados from storage.
     * DELETE /asociados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var asociados $asociados */
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            return $this->sendError('Asociados not found');
        }

        $asociados->delete();

        return $this->sendSuccess('Asociados deleted successfully');
    }
}
