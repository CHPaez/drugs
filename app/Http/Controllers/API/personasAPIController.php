<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepersonasAPIRequest;
use App\Http\Requests\API\UpdatepersonasAPIRequest;
use App\Models\personas;
use App\Repositories\personasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\personasResource;
use Response;

/**
 * Class personasController
 * @package App\Http\Controllers\API
 */

class personasAPIController extends AppBaseController
{
    /** @var  personasRepository */
    private $personasRepository;

    public function __construct(personasRepository $personasRepo)
    {
        $this->personasRepository = $personasRepo;
    }

    /**
     * Display a listing of the personas.
     * GET|HEAD /personas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $personas = $this->personasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(personasResource::collection($personas), 'Personas retrieved successfully');
    }

    /**
     * Store a newly created personas in storage.
     * POST /personas
     *
     * @param CreatepersonasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepersonasAPIRequest $request)
    {
        $input = $request->all();

        $personas = $this->personasRepository->create($input);

        return $this->sendResponse(new personasResource($personas), 'Personas saved successfully');
    }

    /**
     * Display the specified personas.
     * GET|HEAD /personas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var personas $personas */
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            return $this->sendError('Personas not found');
        }

        return $this->sendResponse(new personasResource($personas), 'Personas retrieved successfully');
    }

    /**
     * Update the specified personas in storage.
     * PUT/PATCH /personas/{id}
     *
     * @param int $id
     * @param UpdatepersonasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepersonasAPIRequest $request)
    {
        $input = $request->all();

        /** @var personas $personas */
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            return $this->sendError('Personas not found');
        }

        $personas = $this->personasRepository->update($input, $id);

        return $this->sendResponse(new personasResource($personas), 'personas updated successfully');
    }

    /**
     * Remove the specified personas from storage.
     * DELETE /personas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var personas $personas */
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            return $this->sendError('Personas not found');
        }

        $personas->delete();

        return $this->sendSuccess('Personas deleted successfully');
    }
}
