<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetipificacionllamadasAPIRequest;
use App\Http\Requests\API\UpdatetipificacionllamadasAPIRequest;
use App\Models\tipificacionllamadas;
use App\Repositories\tipificacionllamadasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\tipificacionllamadasResource;
use Response;

/**
 * Class tipificacionllamadasController
 * @package App\Http\Controllers\API
 */

class tipificacionllamadasAPIController extends AppBaseController
{
    /** @var  tipificacionllamadasRepository */
    private $tipificacionllamadasRepository;

    public function __construct(tipificacionllamadasRepository $tipificacionllamadasRepo)
    {
        $this->tipificacionllamadasRepository = $tipificacionllamadasRepo;
    }

    /**
     * Display a listing of the tipificacionllamadas.
     * GET|HEAD /tipificacionllamadas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipificacionllamadas = $this->tipificacionllamadasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(tipificacionllamadasResource::collection($tipificacionllamadas), 'Tipificacionllamadas retrieved successfully');
    }

    /**
     * Store a newly created tipificacionllamadas in storage.
     * POST /tipificacionllamadas
     *
     * @param CreatetipificacionllamadasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetipificacionllamadasAPIRequest $request)
    {
        $input = $request->all();

        $tipificacionllamadas = $this->tipificacionllamadasRepository->create($input);

        return $this->sendResponse(new tipificacionllamadasResource($tipificacionllamadas), 'Tipificacionllamadas saved successfully');
    }

    /**
     * Display the specified tipificacionllamadas.
     * GET|HEAD /tipificacionllamadas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tipificacionllamadas $tipificacionllamadas */
        $tipificacionllamadas = $this->tipificacionllamadasRepository->find($id);

        if (empty($tipificacionllamadas)) {
            return $this->sendError('Tipificacionllamadas not found');
        }

        return $this->sendResponse(new tipificacionllamadasResource($tipificacionllamadas), 'Tipificacionllamadas retrieved successfully');
    }

    /**
     * Update the specified tipificacionllamadas in storage.
     * PUT/PATCH /tipificacionllamadas/{id}
     *
     * @param int $id
     * @param UpdatetipificacionllamadasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipificacionllamadasAPIRequest $request)
    {
        $input = $request->all();

        /** @var tipificacionllamadas $tipificacionllamadas */
        $tipificacionllamadas = $this->tipificacionllamadasRepository->find($id);

        if (empty($tipificacionllamadas)) {
            return $this->sendError('Tipificacionllamadas not found');
        }

        $tipificacionllamadas = $this->tipificacionllamadasRepository->update($input, $id);

        return $this->sendResponse(new tipificacionllamadasResource($tipificacionllamadas), 'tipificacionllamadas updated successfully');
    }

    /**
     * Remove the specified tipificacionllamadas from storage.
     * DELETE /tipificacionllamadas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tipificacionllamadas $tipificacionllamadas */
        $tipificacionllamadas = $this->tipificacionllamadasRepository->find($id);

        if (empty($tipificacionllamadas)) {
            return $this->sendError('Tipificacionllamadas not found');
        }

        $tipificacionllamadas->delete();

        return $this->sendSuccess('Tipificacionllamadas deleted successfully');
    }
}
