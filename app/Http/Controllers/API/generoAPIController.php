<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreategeneroAPIRequest;
use App\Http\Requests\API\UpdategeneroAPIRequest;
use App\Models\genero;
use App\Repositories\generoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\generoResource;
use Response;

/**
 * Class generoController
 * @package App\Http\Controllers\API
 */

class generoAPIController extends AppBaseController
{
    /** @var  generoRepository */
    private $generoRepository;

    public function __construct(generoRepository $generoRepo)
    {
        $this->generoRepository = $generoRepo;
    }

    /**
     * Display a listing of the genero.
     * GET|HEAD /generos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $generos = $this->generoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(generoResource::collection($generos), 'Generos retrieved successfully');
    }

    /**
     * Store a newly created genero in storage.
     * POST /generos
     *
     * @param CreategeneroAPIRequest $request
     *
     * @return Response
     */
    public function store(CreategeneroAPIRequest $request)
    {
        $input = $request->all();

        $genero = $this->generoRepository->create($input);

        return $this->sendResponse(new generoResource($genero), 'Genero saved successfully');
    }

    /**
     * Display the specified genero.
     * GET|HEAD /generos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var genero $genero */
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            return $this->sendError('Genero not found');
        }

        return $this->sendResponse(new generoResource($genero), 'Genero retrieved successfully');
    }

    /**
     * Update the specified genero in storage.
     * PUT/PATCH /generos/{id}
     *
     * @param int $id
     * @param UpdategeneroAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategeneroAPIRequest $request)
    {
        $input = $request->all();

        /** @var genero $genero */
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            return $this->sendError('Genero not found');
        }

        $genero = $this->generoRepository->update($input, $id);

        return $this->sendResponse(new generoResource($genero), 'genero updated successfully');
    }

    /**
     * Remove the specified genero from storage.
     * DELETE /generos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var genero $genero */
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            return $this->sendError('Genero not found');
        }

        $genero->delete();

        return $this->sendSuccess('Genero deleted successfully');
    }
}
