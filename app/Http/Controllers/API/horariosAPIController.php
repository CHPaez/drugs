<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatehorariosAPIRequest;
use App\Http\Requests\API\UpdatehorariosAPIRequest;
use App\Models\horarios;
use App\Repositories\horariosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\horariosResource;
use Response;

/**
 * Class horariosController
 * @package App\Http\Controllers\API
 */

class horariosAPIController extends AppBaseController
{
    /** @var  horariosRepository */
    private $horariosRepository;

    public function __construct(horariosRepository $horariosRepo)
    {
        $this->horariosRepository = $horariosRepo;
    }

    /**
     * Display a listing of the horarios.
     * GET|HEAD /horarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $horarios = $this->horariosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(horariosResource::collection($horarios), 'Horarios retrieved successfully');
    }

    /**
     * Store a newly created horarios in storage.
     * POST /horarios
     *
     * @param CreatehorariosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatehorariosAPIRequest $request)
    {
        $input = $request->all();

        $horarios = $this->horariosRepository->create($input);

        return $this->sendResponse(new horariosResource($horarios), 'Horarios saved successfully');
    }

    /**
     * Display the specified horarios.
     * GET|HEAD /horarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var horarios $horarios */
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            return $this->sendError('Horarios not found');
        }

        return $this->sendResponse(new horariosResource($horarios), 'Horarios retrieved successfully');
    }

    /**
     * Update the specified horarios in storage.
     * PUT/PATCH /horarios/{id}
     *
     * @param int $id
     * @param UpdatehorariosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehorariosAPIRequest $request)
    {
        $input = $request->all();

        /** @var horarios $horarios */
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            return $this->sendError('Horarios not found');
        }

        $horarios = $this->horariosRepository->update($input, $id);

        return $this->sendResponse(new horariosResource($horarios), 'horarios updated successfully');
    }

    /**
     * Remove the specified horarios from storage.
     * DELETE /horarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var horarios $horarios */
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            return $this->sendError('Horarios not found');
        }

        $horarios->delete();

        return $this->sendSuccess('Horarios deleted successfully');
    }
}
