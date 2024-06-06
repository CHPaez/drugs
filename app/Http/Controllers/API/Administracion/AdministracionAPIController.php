<?php

namespace App\Http\Controllers\API\Administracion;

use App\Http\Requests\API\CreateAdministracionAPIRequest;
use App\Http\Requests\API\UpdateAdministracionAPIRequest;
use App\Models\Administracion\Administracion;
use App\Repositories\AdministracionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AdministracionResource;
use Response;

/**
 * Class AdministracionController
 * @package App\Http\Controllers\API
 */

class AdministracionAPIController extends AppBaseController
{
    /** @var  AdministracionRepository */
    private $AdministracionRepository;

    public function __construct(AdministracionRepository $AdministracionRepo)
    {
        $this->AdministracionRepository = $AdministracionRepo;
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
        $Administracion = $this->AdministracionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AdministracionResource::collection($Administracion), 'Administracion retrieved successfully');
    }

    /**
     * Store a newly created asociados in storage.
     * POST /asociados
     *
     * @param CreateAdministracionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAdministracionAPIRequest $request)
    {
        $input = $request->all();

        $Administracion = $this->AdministracionRepository->create($input);

        return $this->sendResponse(new AdministracionResource($Administracion), 'Administracion saved successfully');
    }

    /**
     * Display the specified asociados.
     * GET|HEAD /Administracion/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Administracion $Administracion */
        $Administracion = $this->AdministracionRepository->find($id);

        if (empty($Administracion)) {
            return $this->sendError('Administracion not found');
        }

        return $this->sendResponse(new AdministracionResource($Administracion), 'Administracion retrieved successfully');
    }

    /**
     * Update the specified asociados in storage.
     * PUT/PATCH /Administracion/{id}
     *
     * @param int $id
     * @param UpdateAdministracionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdministracionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Administracion $Administracion */
        $Administracion = $this->AdministracionRepository->find($id);

        if (empty($Administracion)) {
            return $this->sendError('Administracion not found');
        }

        $Administracion = $this->AdministracionRepository->update($input, $id);

        return $this->sendResponse(new AdministracionResource($Administracion), 'Administracion updated successfully');
    }

    /**
     * Remove the specified asociados from storage.
     * DELETE /Administracion/{id}
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
        $Administracion = $this->AdministracionRepository->find($id);

        if (empty($Administracion)) {
            return $this->sendError('Administracion not found');
        }

        $Administracion->delete();

        return $this->sendSuccess('Administracion deleted successfully');
    }
}
