<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateestadospersonasRequest;
use App\Http\Requests\UpdateestadospersonasRequest;
use App\Repositories\estadospersonasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class estadospersonasController extends AppBaseController
{
    /** @var estadospersonasRepository $estadospersonasRepository*/
    private $estadospersonasRepository;

    public function __construct(estadospersonasRepository $estadospersonasRepo)
    {
        $this->estadospersonasRepository = $estadospersonasRepo;
    }

    /**
     * Display a listing of the estadospersonas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estadospersonas = $this->estadospersonasRepository->all();

        return view('estadospersonas.index')
            ->with('estadospersonas', $estadospersonas);
    }

    /**
     * Show the form for creating a new estadospersonas.
     *
     * @return Response
     */
    public function create()
    {
        return view('estadospersonas.create');
    }

    /**
     * Store a newly created estadospersonas in storage.
     *
     * @param CreateestadospersonasRequest $request
     *
     * @return Response
     */
    public function store(CreateestadospersonasRequest $request)
    {
        $input = $request->all();

        $estadospersonas = $this->estadospersonasRepository->create($input);

        Flash::success('Estadospersonas saved successfully.');

        return redirect(route('estadospersonas.index'));
    }

    /**
     * Display the specified estadospersonas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            Flash::error('Estadospersonas not found');

            return redirect(route('estadospersonas.index'));
        }

        return view('estadospersonas.show')->with('estadospersonas', $estadospersonas);
    }

    /**
     * Show the form for editing the specified estadospersonas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            Flash::error('Estadospersonas not found');

            return redirect(route('estadospersonas.index'));
        }

        return view('estadospersonas.edit')->with('estadospersonas', $estadospersonas);
    }

    /**
     * Update the specified estadospersonas in storage.
     *
     * @param int $id
     * @param UpdateestadospersonasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestadospersonasRequest $request)
    {
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            Flash::error('Estadospersonas not found');

            return redirect(route('estadospersonas.index'));
        }

        $estadospersonas = $this->estadospersonasRepository->update($request->all(), $id);

        Flash::success('Estadospersonas updated successfully.');

        return redirect(route('estadospersonas.index'));
    }

    /**
     * Remove the specified estadospersonas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadospersonas = $this->estadospersonasRepository->find($id);

        if (empty($estadospersonas)) {
            Flash::error('Estadospersonas not found');

            return redirect(route('estadospersonas.index'));
        }

        $this->estadospersonasRepository->delete($id);

        Flash::success('Estadospersonas deleted successfully.');

        return redirect(route('estadospersonas.index'));
    }
}
