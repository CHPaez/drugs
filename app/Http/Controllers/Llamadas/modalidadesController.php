<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreatemodalidadesRequest;
use App\Http\Requests\UpdatemodalidadesRequest;
use App\Repositories\modalidadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class modalidadesController extends AppBaseController
{
    /** @var modalidadesRepository $modalidadesRepository*/
    private $modalidadesRepository;

    public function __construct(modalidadesRepository $modalidadesRepo)
    {
        $this->modalidadesRepository = $modalidadesRepo;
    }

    /**
     * Display a listing of the modalidades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $modalidades = $this->modalidadesRepository->all();
        
        return view('llamadas.modalidades.index')
            ->with('modalidades', $modalidades);
    }

    /**
     * Show the form for creating a new modalidades.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.modalidades.create');
    }

    /**
     * Store a newly created modalidades in storage.
     *
     * @param CreatemodalidadesRequest $request
     *
     * @return Response
     */
    public function store(CreatemodalidadesRequest $request)
    {
        $input = $request->all();

        $modalidades = $this->modalidadesRepository->create($input);

        Flash::success('Modalidades saved successfully.');

        return redirect(route('modalidades.index'));
    }

    /**
     * Display the specified modalidades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            Flash::error('Modalidades not found');

            return redirect(route('modalidades.index'));
        }

        return view('llamadas.modalidades.show')->with('modalidades', $modalidades);
    }

    /**
     * Show the form for editing the specified modalidades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            Flash::error('Modalidades not found');

            return redirect(route('modalidades.index'));
        }

        return view('llamadas.modalidades.edit')->with('modalidades', $modalidades);
    }

    /**
     * Update the specified modalidades in storage.
     *
     * @param int $id
     * @param UpdatemodalidadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemodalidadesRequest $request)
    {
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            Flash::error('Modalidades not found');

            return redirect(route('modalidades.index'));
        }

        $modalidades = $this->modalidadesRepository->update($request->all(), $id);

        Flash::success('Modalidades updated successfully.');

        return redirect(route('modalidades.index'));
    }

    /**
     * Remove the specified modalidades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modalidades = $this->modalidadesRepository->find($id);

        if (empty($modalidades)) {
            Flash::error('Modalidades not found');

            return redirect(route('modalidades.index'));
        }

        $this->modalidadesRepository->delete($id);

        Flash::success('Modalidades deleted successfully.');

        return redirect(route('modalidades.index'));
    }
}
