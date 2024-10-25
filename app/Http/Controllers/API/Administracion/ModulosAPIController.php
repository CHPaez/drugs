<?php

namespace App\Http\Controllers\API\Modulos;

use App\Http\Requests\API\CreateModulosAPIRequest;
use App\Http\Requests\API\UpdateModulosAPIRequest;
use App\Models\Administracion\Modulos;
use App\Repositories\ModulosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ModulosResource;
use Response;

/**
 * Class ModulosController
 * @package App\Http\Controllers\API
 */

class ModulosAPIController extends AppBaseController
{
    /** @var  ModulosRepository */
    private $ModulosRepository;

    public function __construct(ModulosRepository $ModulosRepo)
    {
        $this->ModulosRepository = $ModulosRepo;
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
        $Modulos = $this->ModulosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ModulosResource::collection($Modulos), 'Modulos retrieved successfully');
    }

    /**
     * Store a newly created asociados in storage.
     * POST /asociados
     *
     * @param CreateModulosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateModulosAPIRequest $request)
    {
        $input = $request->all();

        $Modulos = $this->ModulosRepository->create($input);

        return $this->sendResponse(new ModulosResource($Modulos), 'Modulos saved successfully');
    }

    /**
     * Display the specified asociados.
     * GET|HEAD /Modulos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Modulos $Modulos */
        $Modulos = $this->ModulosRepository->find($id);

        if (empty($Modulos)) {
            return $this->sendError('Modulos not found');
        }

        return $this->sendResponse(new ModulosResource($Modulos), 'Modulos retrieved successfully');
    }

    /**
     * Update the specified asociados in storage.
     * PUT/PATCH /Modulos/{id}
     *
     * @param int $id
     * @param UpdateModulosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModulosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Modulos $Modulos */
        $Modulos = $this->ModulosRepository->find($id);

        if (empty($Modulos)) {
            return $this->sendError('Modulos not found');
        }

        $Modulos = $this->ModulosRepository->update($input, $id);

        return $this->sendResponse(new ModulosResource($Modulos), 'Modulos updated successfully');
    }

    /**
     * Remove the specified asociados from storage.
     * DELETE /Modulos/{id}
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
        $Modulos = $this->ModulosRepository->find($id);

        if (empty($Modulos)) {
            return $this->sendError('Modulos not found');
        }

        $Modulos->delete();

        return $this->sendSuccess('Modulos deleted successfully');
    }
}
