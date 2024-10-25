<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedatosadicionalesAPIRequest;
use App\Http\Requests\API\UpdatedatosadicionalesAPIRequest;
use App\Models\datosadicionales;
use App\Repositories\datosadicionalesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\datosadicionalesResource;
use Response;

/**
 * Class datosadicionalesController
 * @package App\Http\Controllers\API
 */

class datosadicionalesAPIController extends AppBaseController
{
    /** @var  datosadicionalesRepository */
    private $datosadicionalesRepository;

    public function __construct(datosadicionalesRepository $datosadicionalesRepo)
    {
        $this->datosadicionalesRepository = $datosadicionalesRepo;
    }

    /**
     * Display a listing of the datosadicionales.
     * GET|HEAD /datosadicionales
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $datosadicionales = $this->datosadicionalesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(datosadicionalesResource::collection($datosadicionales), 'Datosadicionales retrieved successfully');
    }

    /**
     * Store a newly created datosadicionales in storage.
     * POST /datosadicionales
     *
     * @param CreatedatosadicionalesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedatosadicionalesAPIRequest $request)
    {
        $input = $request->all();

        $datosadicionales = $this->datosadicionalesRepository->create($input);

        return $this->sendResponse(new datosadicionalesResource($datosadicionales), 'Datosadicionales saved successfully');
    }

    /**
     * Display the specified datosadicionales.
     * GET|HEAD /datosadicionales/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var datosadicionales $datosadicionales */
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            return $this->sendError('Datosadicionales not found');
        }

        return $this->sendResponse(new datosadicionalesResource($datosadicionales), 'Datosadicionales retrieved successfully');
    }

    /**
     * Update the specified datosadicionales in storage.
     * PUT/PATCH /datosadicionales/{id}
     *
     * @param int $id
     * @param UpdatedatosadicionalesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedatosadicionalesAPIRequest $request)
    {
        $input = $request->all();

        /** @var datosadicionales $datosadicionales */
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            return $this->sendError('Datosadicionales not found');
        }

        $datosadicionales = $this->datosadicionalesRepository->update($input, $id);

        return $this->sendResponse(new datosadicionalesResource($datosadicionales), 'datosadicionales updated successfully');
    }

    /**
     * Remove the specified datosadicionales from storage.
     * DELETE /datosadicionales/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var datosadicionales $datosadicionales */
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            return $this->sendError('Datosadicionales not found');
        }

        $datosadicionales->delete();

        return $this->sendSuccess('Datosadicionales deleted successfully');
    }
}
