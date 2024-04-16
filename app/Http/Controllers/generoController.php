<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreategeneroRequest;
use App\Http\Requests\UpdategeneroRequest;
use App\Repositories\generoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class generoController extends AppBaseController
{
    /** @var generoRepository $generoRepository*/
    private $generoRepository;

    public function __construct(generoRepository $generoRepo)
    {
        $this->generoRepository = $generoRepo;
    }

    /**
     * Display a listing of the genero.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $generos = $this->generoRepository->all();

        return view('generos.index')
            ->with('generos', $generos);
    }

    /**
     * Show the form for creating a new genero.
     *
     * @return Response
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created genero in storage.
     *
     * @param CreategeneroRequest $request
     *
     * @return Response
     */
    public function store(CreategeneroRequest $request)
    {
        $input = $request->all();

        $genero = $this->generoRepository->create($input);

        Flash::success('Genero saved successfully.');

        return redirect(route('generos.index'));
    }

    /**
     * Display the specified genero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('generos.index'));
        }

        return view('generos.show')->with('genero', $genero);
    }

    /**
     * Show the form for editing the specified genero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('generos.index'));
        }

        return view('generos.edit')->with('genero', $genero);
    }

    /**
     * Update the specified genero in storage.
     *
     * @param int $id
     * @param UpdategeneroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategeneroRequest $request)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('generos.index'));
        }

        $genero = $this->generoRepository->update($request->all(), $id);

        Flash::success('Genero updated successfully.');

        return redirect(route('generos.index'));
    }

    /**
     * Remove the specified genero from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('generos.index'));
        }

        $this->generoRepository->delete($id);

        Flash::success('Genero deleted successfully.');

        return redirect(route('generos.index'));
    }
}
