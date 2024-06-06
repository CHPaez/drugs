<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreateinscritosRequest;
use App\Http\Requests\UpdateinscritosRequest;
use App\Repositories\inscritosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class inscritosController extends AppBaseController
{
    /** @var inscritosRepository $inscritosRepository*/
    private $inscritosRepository;

    public function __construct(inscritosRepository $inscritosRepo)
    {
        $this->inscritosRepository = $inscritosRepo;
    }

    /**
     * Display a listing of the inscritos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $inscritos = $this->inscritosRepository->all();

        return view('llamadas.inscritos.index')
            ->with('inscritos', $inscritos);
    }

    /**
     * Show the form for creating a new inscritos.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.inscritos.create');
    }

    /**
     * Store a newly created inscritos in storage.
     *
     * @param CreateinscritosRequest $request
     *
     * @return Response
     */
    public function store(CreateinscritosRequest $request)
    {
        $input = $request->all();

        $inscritos = $this->inscritosRepository->create($input);

        Flash::success('Inscritos saved successfully.');

        return redirect(route('inscritos.index'));
    }

    /**
     * Display the specified inscritos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            Flash::error('Inscritos not found');

            return redirect(route('inscritos.index'));
        }

        return view('inscritos.show')->with('inscritos', $inscritos);
    }

    /**
     * Show the form for editing the specified inscritos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            Flash::error('Inscritos not found');

            return redirect(route('inscritos.index'));
        }

        return view('inscritos.edit')->with('inscritos', $inscritos);
    }

    /**
     * Update the specified inscritos in storage.
     *
     * @param int $id
     * @param UpdateinscritosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinscritosRequest $request)
    {
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            Flash::error('Inscritos not found');

            return redirect(route('inscritos.index'));
        }

        $inscritos = $this->inscritosRepository->update($request->all(), $id);

        Flash::success('Inscritos updated successfully.');

        return redirect(route('inscritos.index'));
    }

    /**
     * Remove the specified inscritos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscritos = $this->inscritosRepository->find($id);

        if (empty($inscritos)) {
            Flash::error('Inscritos not found');

            return redirect(route('inscritos.index'));
        }

        $this->inscritosRepository->delete($id);

        Flash::success('Inscritos deleted successfully.');

        return redirect(route('inscritos.index'));
    }
}
