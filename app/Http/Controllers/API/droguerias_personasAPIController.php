<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdroguerias_personasAPIRequest;
use App\Http\Requests\API\Updatedroguerias_personasAPIRequest;
use App\Models\droguerias_personas;
use App\Repositories\droguerias_personasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\droguerias_personasResource;
use Response;

/**
 * Class droguerias_personasController
 * @package App\Http\Controllers\API
 */

class droguerias_personasAPIController extends AppBaseController
{
    /** @var  droguerias_personasRepository */
    private $drogueriasPersonasRepository;

    public function __construct(droguerias_personasRepository $drogueriasPersonasRepo)
    {
        $this->drogueriasPersonasRepository = $drogueriasPersonasRepo;
    }

    /**
     * Display a listing of the droguerias_personas.
     * GET|HEAD /drogueriasPersonas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $drogueriasPersonas = $this->drogueriasPersonasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(droguerias_personasResource::collection($drogueriasPersonas), 'Droguerias Personas retrieved successfully');
    }

    /**
     * Store a newly created droguerias_personas in storage.
     * POST /drogueriasPersonas
     *
     * @param Createdroguerias_personasAPIRequest $request
     *
     * @return Response
     */
    public function store(Createdroguerias_personasAPIRequest $request)
    {
        $input = $request->all();

        $drogueriasPersonas = $this->drogueriasPersonasRepository->create($input);

        return $this->sendResponse(new droguerias_personasResource($drogueriasPersonas), 'Droguerias Personas saved successfully');
    }

    /**
     * Display the specified droguerias_personas.
     * GET|HEAD /drogueriasPersonas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var droguerias_personas $drogueriasPersonas */
        $drogueriasPersonas = $this->drogueriasPersonasRepository->find($id);

        if (empty($drogueriasPersonas)) {
            return $this->sendError('Droguerias Personas not found');
        }

        return $this->sendResponse(new droguerias_personasResource($drogueriasPersonas), 'Droguerias Personas retrieved successfully');
    }

    /**
     * Update the specified droguerias_personas in storage.
     * PUT/PATCH /drogueriasPersonas/{id}
     *
     * @param int $id
     * @param Updatedroguerias_personasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedroguerias_personasAPIRequest $request)
    {
        $input = $request->all();

        /** @var droguerias_personas $drogueriasPersonas */
        $drogueriasPersonas = $this->drogueriasPersonasRepository->find($id);

        if (empty($drogueriasPersonas)) {
            return $this->sendError('Droguerias Personas not found');
        }

        $drogueriasPersonas = $this->drogueriasPersonasRepository->update($input, $id);

        return $this->sendResponse(new droguerias_personasResource($drogueriasPersonas), 'droguerias_personas updated successfully');
    }

    /**
     * Remove the specified droguerias_personas from storage.
     * DELETE /drogueriasPersonas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var droguerias_personas $drogueriasPersonas */
        $drogueriasPersonas = $this->drogueriasPersonasRepository->find($id);

        if (empty($drogueriasPersonas)) {
            return $this->sendError('Droguerias Personas not found');
        }

        $drogueriasPersonas->delete();

        return $this->sendSuccess('Droguerias Personas deleted successfully');
    }
}
