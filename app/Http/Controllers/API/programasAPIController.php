<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateprogramasAPIRequest;
use App\Http\Requests\API\UpdateprogramasAPIRequest;
use App\Models\programas;
use App\Repositories\programasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\programasResource;
use Response;

/**
 * Class programasController
 * @package App\Http\Controllers\API
 */

class programasAPIController extends AppBaseController
{
    /** @var  programasRepository */
    private $programasRepository;

    public function __construct(programasRepository $programasRepo)
    {
        $this->programasRepository = $programasRepo;
    }

    /**
     * Display a listing of the programas.
     * GET|HEAD /programas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $programas = $this->programasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(programasResource::collection($programas), 'Programas retrieved successfully');
    }

    /**
     * Store a newly created programas in storage.
     * POST /programas
     *
     * @param CreateprogramasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateprogramasAPIRequest $request)
    {
        $input = $request->all();

        $programas = $this->programasRepository->create($input);

        return $this->sendResponse(new programasResource($programas), 'Programas saved successfully');
    }

    /**
     * Display the specified programas.
     * GET|HEAD /programas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var programas $programas */
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            return $this->sendError('Programas not found');
        }

        return $this->sendResponse(new programasResource($programas), 'Programas retrieved successfully');
    }

    /**
     * Update the specified programas in storage.
     * PUT/PATCH /programas/{id}
     *
     * @param int $id
     * @param UpdateprogramasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprogramasAPIRequest $request)
    {
        $input = $request->all();

        /** @var programas $programas */
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            return $this->sendError('Programas not found');
        }

        $programas = $this->programasRepository->update($input, $id);

        return $this->sendResponse(new programasResource($programas), 'programas updated successfully');
    }

    /**
     * Remove the specified programas from storage.
     * DELETE /programas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var programas $programas */
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            return $this->sendError('Programas not found');
        }

        $programas->delete();

        return $this->sendSuccess('Programas deleted successfully');
    }
}
