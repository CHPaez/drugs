<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateinscritosAPIRequest;
use App\Http\Requests\API\UpdateinscritosAPIRequest;
use App\Models\inscritos;
use App\Repositories\inscritosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\inscritosResource;
use Response;

/**
 * Class inscritosController
 * @package App\Http\Controllers\API
 */

class inscritosAPIController extends AppBaseController
{
    /** @var  inscritosRepository */
    private $inscritosRepository;

    public function __construct(inscritosRepository $inscritosRepo)
    {
        $this->inscritosRepository = $inscritosRepo;
    }

    /**
     * Display a listing of the inscritos.
     * GET|HEAD /inscritos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $inscritos = $this->inscritosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(inscritosResource::collection($inscritos), 'Inscritos retrieved successfully');
    }

    /**
     * Store a newly created inscritos in storage.
     * POST /inscritos
     *
     * @param CreateinscritosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateinscritosAPIRequest $request)
    {
        $input = $request->all();

        $inscritos = $this->inscritosRepository->create($input);

        return $this->sendResponse(new inscritosResource($inscritos), 'Inscritos saved successfully');
    }

    /**
     * Display the specified inscritos.
     * GET|HEAD /inscritos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var inscritos $inscritos */
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            return $this->sendError('Inscritos not found');
        }

        return $this->sendResponse(new inscritosResource($inscritos), 'Inscritos retrieved successfully');
    }

    /**
     * Update the specified inscritos in storage.
     * PUT/PATCH /inscritos/{id}
     *
     * @param int $id
     * @param UpdateinscritosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinscritosAPIRequest $request)
    {
        $input = $request->all();

        /** @var inscritos $inscritos */
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            return $this->sendError('Inscritos not found');
        }

        $inscritos = $this->inscritosRepository->update($input, $id);

        return $this->sendResponse(new inscritosResource($inscritos), 'inscritos updated successfully');
    }

    /**
     * Remove the specified inscritos from storage.
     * DELETE /inscritos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var inscritos $inscritos */
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            return $this->sendError('Inscritos not found');
        }

        $inscritos->delete();

        return $this->sendSuccess('Inscritos deleted successfully');
    }
}
