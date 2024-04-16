<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateasociadosRequest;
use App\Http\Requests\UpdateasociadosRequest;
use App\Repositories\asociadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class asociadosController extends AppBaseController
{
    /** @var asociadosRepository $asociadosRepository*/
    private $asociadosRepository;

    public function __construct(asociadosRepository $asociadosRepo)
    {
        $this->asociadosRepository = $asociadosRepo;
    }

    /**
     * Display a listing of the asociados.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $asociados = $this->asociadosRepository->all();

        return view('asociados.index')
            ->with('asociados', $asociados);
    }

    /**
     * Show the form for creating a new asociados.
     *
     * @return Response
     */
    public function create()
    {
        return view('asociados.create');
    }

    /**
     * Store a newly created asociados in storage.
     *
     * @param CreateasociadosRequest $request
     *
     * @return Response
     */
    public function store(CreateasociadosRequest $request)
    {
        $input = $request->all();

        $asociados = $this->asociadosRepository->create($input);

        Flash::success('Asociados saved successfully.');

        return redirect(route('asociados.index'));
    }

    /**
     * Display the specified asociados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            Flash::error('Asociados not found');

            return redirect(route('asociados.index'));
        }

        return view('asociados.show')->with('asociados', $asociados);
    }

    /**
     * Show the form for editing the specified asociados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            Flash::error('Asociados not found');

            return redirect(route('asociados.index'));
        }

        return view('asociados.edit')->with('asociados', $asociados);
    }

    /**
     * Update the specified asociados in storage.
     *
     * @param int $id
     * @param UpdateasociadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateasociadosRequest $request)
    {
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            Flash::error('Asociados not found');

            return redirect(route('asociados.index'));
        }

        $asociados = $this->asociadosRepository->update($request->all(), $id);

        Flash::success('Asociados updated successfully.');

        return redirect(route('asociados.index'));
    }

    /**
     * Remove the specified asociados from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asociados = $this->asociadosRepository->find($id);

        if (empty($asociados)) {
            Flash::error('Asociados not found');

            return redirect(route('asociados.index'));
        }

        $this->asociadosRepository->delete($id);

        Flash::success('Asociados deleted successfully.');

        return redirect(route('asociados.index'));
    }
}
