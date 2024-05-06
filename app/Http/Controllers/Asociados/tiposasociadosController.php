<?php

namespace App\Http\Controllers\Asociados;

use App\Http\Requests\CreatetiposasociadosRequest;
use App\Http\Requests\UpdatetiposasociadosRequest;
use App\Repositories\tiposasociadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tiposasociadosController extends AppBaseController
{
    /** @var tiposasociadosRepository $tiposasociadosRepository*/
    private $tiposasociadosRepository;

    public function __construct(tiposasociadosRepository $tiposasociadosRepo)
    {
        $this->tiposasociadosRepository = $tiposasociadosRepo;
    }

    /**
     * Display a listing of the tiposasociados.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tiposasociados = $this->tiposasociadosRepository->all();

        return view('asociados.tiposasociados.index')
            ->with('tiposasociados', $tiposasociados);
    }

    /**
     * Show the form for creating a new tiposasociados.
     *
     * @return Response
     */
    public function create()
    {
        return view('asociados.tiposasociados.create');
    }

    /**
     * Store a newly created tiposasociados in storage.
     *
     * @param CreatetiposasociadosRequest $request
     *
     * @return Response
     */
    public function store(CreatetiposasociadosRequest $request)
    {
        $input = $request->all();

        $tiposasociados = $this->tiposasociadosRepository->create($input);

        Flash::success('Tiposasociados saved successfully.');

        return redirect(route('tiposasociados.index'));
    }

    /**
     * Display the specified tiposasociados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            Flash::error('Tiposasociados not found');

            return redirect(route('tiposasociados'));
        }

        return view('asociados.tiposasociados.show')->with('tiposasociados', $tiposasociados);
    }

    /**
     * Show the form for editing the specified tiposasociados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            Flash::error('Tiposasociados not found');

            return redirect(route('tiposasociados.index'));
        }

        return view('asociados.tiposasociados.edit')->with('tiposasociados', $tiposasociados);
    }

    /**
     * Update the specified tiposasociados in storage.
     *
     * @param int $id
     * @param UpdatetiposasociadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiposasociadosRequest $request)
    {
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            Flash::error('Tiposasociados not found');

            return redirect(route('tiposasociados.index'));
        }

        $tiposasociados = $this->tiposasociadosRepository->update($request->all(), $id);

        Flash::success('Tiposasociados updated successfully.');

        return redirect(route('tiposasociados.index'));
    }

    /**
     * Remove the specified tiposasociados from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tiposasociados = $this->tiposasociadosRepository->find($id);

        if (empty($tiposasociados)) {
            Flash::error('Tiposasociados not found');

            return redirect(route('tiposasociados.index'));
        }

        $this->tiposasociadosRepository->delete($id);

        Flash::success('Tiposasociados deleted successfully.');

        return redirect(route('tiposasociados.index'));
    }
}
