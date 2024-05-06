<?php

namespace App\Http\Controllers\Droguerias;

use App\Http\Requests\CreatetiposdrogueriasRequest;
use App\Http\Requests\UpdatetiposdrogueriasRequest;
use App\Repositories\tiposdrogueriasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tiposdrogueriasController extends AppBaseController
{
    /** @var tiposdrogueriasRepository $tiposdrogueriasRepository*/
    private $tiposdrogueriasRepository;

    public function __construct(tiposdrogueriasRepository $tiposdrogueriasRepo)
    {
        $this->tiposdrogueriasRepository = $tiposdrogueriasRepo;
    }

    /**
     * Display a listing of the tiposdroguerias.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tiposdroguerias = $this->tiposdrogueriasRepository->all();

        return view('droguerias.tiposdroguerias.index')
            ->with('tiposdroguerias', $tiposdroguerias);
    }

    /**
     * Show the form for creating a new tiposdroguerias.
     *
     * @return Response
     */
    public function create()
    {
        return view('droguerias.tiposdroguerias.create');
    }

    /**
     * Store a newly created tiposdroguerias in storage.
     *
     * @param CreatetiposdrogueriasRequest $request
     *
     * @return Response
     */
    public function store(CreatetiposdrogueriasRequest $request)
    {
        $input = $request->all();

        $tiposdroguerias = $this->tiposdrogueriasRepository->create($input);

        Flash::success('Tiposdroguerias saved successfully.');

        return redirect(route('tiposdroguerias.index'));
    }

    /**
     * Display the specified tiposdroguerias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tiposdroguerias = $this->tiposdrogueriasRepository->find($id);

        if (empty($tiposdroguerias)) {
            Flash::error('Tiposdroguerias not found');

            return redirect(route('tiposdroguerias.index'));
        }

        return view('droguerias.tiposdroguerias.show')->with('tiposdroguerias', $tiposdroguerias);
    }

    /**
     * Show the form for editing the specified tiposdroguerias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tiposdroguerias = $this->tiposdrogueriasRepository->find($id);

        if (empty($tiposdroguerias)) {
            Flash::error('Tiposdroguerias not found');

            return redirect(route('tiposdroguerias.index'));
        }

        return view('droguerias.tiposdroguerias.edit')->with('tiposdroguerias', $tiposdroguerias);
    }

    /**
     * Update the specified tiposdroguerias in storage.
     *
     * @param int $id
     * @param UpdatetiposdrogueriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiposdrogueriasRequest $request)
    {
        $tiposdroguerias = $this->tiposdrogueriasRepository->find($id);

        if (empty($tiposdroguerias)) {
            Flash::error('Tiposdroguerias not found');

            return redirect(route('tiposdroguerias.index'));
        }

        $tiposdroguerias = $this->tiposdrogueriasRepository->update($request->all(), $id);

        Flash::success('Tiposdroguerias updated successfully.');

        return redirect(route('tiposdroguerias.index'));
    }

    /**
     * Remove the specified tiposdroguerias from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tiposdroguerias = $this->tiposdrogueriasRepository->find($id);

        if (empty($tiposdroguerias)) {
            Flash::error('Tiposdroguerias not found');

            return redirect(route('tiposdroguerias.index'));
        }

        $this->tiposdrogueriasRepository->delete($id);

        Flash::success('Tiposdroguerias deleted successfully.');

        return redirect(route('tiposdroguerias.index'));
    }
}
