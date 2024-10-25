<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepruebasAPIRequest;
use App\Http\Requests\API\UpdatepruebasAPIRequest;
use App\Models\pruebas;
use App\Repositories\pruebasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\pruebasResource;
use Response;

/**
 * Class pruebasController
 * @package App\Http\Controllers\API
 */

class pruebasAPIController extends AppBaseController
{
    /** @var  pruebasRepository */
    private $pruebasRepository;

    public function __construct(pruebasRepository $pruebasRepo)
    {
        $this->pruebasRepository = $pruebasRepo;
    }

    /**
     * Display a listing of the pruebas.
     * GET|HEAD /pruebas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pruebas = $this->pruebasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(pruebasResource::collection($pruebas), 'Pruebas retrieved successfully');
    }

    /**
     * Store a newly created pruebas in storage.
     * POST /pruebas
     *
     * @param CreatepruebasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepruebasAPIRequest $request)
    {
        $input = $request->all();

        $pruebas = $this->pruebasRepository->create($input);

        return $this->sendResponse(new pruebasResource($pruebas), 'Pruebas saved successfully');
    }

    /**
     * Display the specified pruebas.
     * GET|HEAD /pruebas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var pruebas $pruebas */
        $pruebas = $this->pruebasRepository->find($id);

        if (empty($pruebas)) {
            return $this->sendError('Pruebas not found');
        }

        return $this->sendResponse(new pruebasResource($pruebas), 'Pruebas retrieved successfully');
    }

    /**
     * Update the specified pruebas in storage.
     * PUT/PATCH /pruebas/{id}
     *
     * @param int $id
     * @param UpdatepruebasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepruebasAPIRequest $request)
    {
        $input = $request->all();

        /** @var pruebas $pruebas */
        $pruebas = $this->pruebasRepository->find($id);

        if (empty($pruebas)) {
            return $this->sendError('Pruebas not found');
        }

        $pruebas = $this->pruebasRepository->update($input, $id);

        return $this->sendResponse(new pruebasResource($pruebas), 'pruebas updated successfully');
    }

    /**
     * Remove the specified pruebas from storage.
     * DELETE /pruebas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var pruebas $pruebas */
        $pruebas = $this->pruebasRepository->find($id);

        if (empty($pruebas)) {
            return $this->sendError('Pruebas not found');
        }

        $pruebas->delete();

        return $this->sendSuccess('Pruebas deleted successfully');
    }
}
