<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatehistorialllamadasAPIRequest;
use App\Http\Requests\API\UpdatehistorialllamadasAPIRequest;
use App\Models\historialllamadas;
use App\Repositories\historialllamadasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\historialllamadasResource;
use Response;

/**
 * Class historialllamadasController
 * @package App\Http\Controllers\API
 */

class historialllamadasAPIController extends AppBaseController
{
    /** @var  historialllamadasRepository */
    private $historialllamadasRepository;

    public function __construct(historialllamadasRepository $historialllamadasRepo)
    {
        $this->historialllamadasRepository = $historialllamadasRepo;
    }

    /**
     * Display a listing of the historialllamadas.
     * GET|HEAD /historialllamadas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $historialllamadas = $this->historialllamadasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(historialllamadasResource::collection($historialllamadas), 'Historialllamadas retrieved successfully');
    }

    /**
     * Store a newly created historialllamadas in storage.
     * POST /historialllamadas
     *
     * @param CreatehistorialllamadasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatehistorialllamadasAPIRequest $request)
    {
        $input = $request->all();

        $historialllamadas = $this->historialllamadasRepository->create($input);

        return $this->sendResponse(new historialllamadasResource($historialllamadas), 'Historialllamadas saved successfully');
    }

    /**
     * Display the specified historialllamadas.
     * GET|HEAD /historialllamadas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var historialllamadas $historialllamadas */
        $historialllamadas = $this->historialllamadasRepository->find($id);

        if (empty($historialllamadas)) {
            return $this->sendError('Historialllamadas not found');
        }

        return $this->sendResponse(new historialllamadasResource($historialllamadas), 'Historialllamadas retrieved successfully');
    }

    /**
     * Update the specified historialllamadas in storage.
     * PUT/PATCH /historialllamadas/{id}
     *
     * @param int $id
     * @param UpdatehistorialllamadasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehistorialllamadasAPIRequest $request)
    {
        $input = $request->all();

        /** @var historialllamadas $historialllamadas */
        $historialllamadas = $this->historialllamadasRepository->find($id);

        if (empty($historialllamadas)) {
            return $this->sendError('Historialllamadas not found');
        }

        $historialllamadas = $this->historialllamadasRepository->update($input, $id);

        return $this->sendResponse(new historialllamadasResource($historialllamadas), 'historialllamadas updated successfully');
    }

    /**
     * Remove the specified historialllamadas from storage.
     * DELETE /historialllamadas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var historialllamadas $historialllamadas */
        $historialllamadas = $this->historialllamadasRepository->find($id);

        if (empty($historialllamadas)) {
            return $this->sendError('Historialllamadas not found');
        }

        $historialllamadas->delete();

        return $this->sendSuccess('Historialllamadas deleted successfully');
    }
}
