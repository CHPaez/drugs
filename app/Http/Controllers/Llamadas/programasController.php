<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreateprogramasRequest;
use App\Http\Requests\UpdateprogramasRequest;
use App\Repositories\programasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class programasController extends AppBaseController
{
    /** @var programasRepository $programasRepository*/
    private $programasRepository;

    public function __construct(programasRepository $programasRepo)
    {
        $this->programasRepository = $programasRepo;
    }

    /**
     * Display a listing of the programas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $programas = $this->programasRepository->all();

        return view('llamadas.programas.index')
            ->with('programas', $programas);
    }

    /**
     * Show the form for creating a new programas.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.programas.create');
    }

    /**
     * Store a newly created programas in storage.
     *
     * @param CreateprogramasRequest $request
     *
     * @return Response
     */
    public function store(CreateprogramasRequest $request)
    {
        $input = $request->all();

        $programas = $this->programasRepository->create($input);

        Flash::success('Programas saved successfully.');

        return redirect(route('programas.index'));
    }

    /**
     * Display the specified programas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            Flash::error('Programas not found');

            return redirect(route('llamadas.programas.index'));
        }

        return view('llamadas.programas.show')->with('programas', $programas);
    }

    /**
     * Show the form for editing the specified programas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            Flash::error('Programas not found');

            return redirect(route('programas.index'));
        }

        return view('llamadas.programas.edit')->with('programas', $programas);
    }

    /**
     * Update the specified programas in storage.
     *
     * @param int $id
     * @param UpdateprogramasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprogramasRequest $request)
    {
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            Flash::error('Programas not found');

            return redirect(route('programas.index'));
        }

        $programas = $this->programasRepository->update($request->all(), $id);

        Flash::success('Programas updated successfully.');

        return redirect(route('programas.index'));
    }

    /**
     * Remove the specified programas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $programas = $this->programasRepository->find($id);

        if (empty($programas)) {
            Flash::error('Programas not found');

            return redirect(route('programas.index'));
        }

        $this->programasRepository->delete($id);

        Flash::success('Programas deleted successfully.');

        return redirect(route('programas.index'));
    }
}
