<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreatedatosadicionalesRequest;
use App\Http\Requests\UpdatedatosadicionalesRequest;
use App\Repositories\datosadicionalesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class datosadicionalesController extends AppBaseController
{
    /** @var datosadicionalesRepository $datosadicionalesRepository*/
    private $datosadicionalesRepository;

    public function __construct(datosadicionalesRepository $datosadicionalesRepo)
    {
        $this->datosadicionalesRepository = $datosadicionalesRepo;
    }

    /**
     * Display a listing of the datosadicionales.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $datosadicionales = $this->datosadicionalesRepository->all();

        return view('llamadas.datosadicionales.index')
            ->with('datosadicionales', $datosadicionales);
    }

    /**
     * Show the form for creating a new datosadicionales.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.datosadicionales.create');
    }

    /**
     * Store a newly created datosadicionales in storage.
     *
     * @param CreatedatosadicionalesRequest $request
     *
     * @return Response
     */
    public function store(CreatedatosadicionalesRequest $request)
    {
        $input = $request->all();

        $datosadicionales = $this->datosadicionalesRepository->create($input);

        Flash::success('Datosadicionales saved successfully.');

        return redirect(route('datosadicionales.index'));
    }

    /**
     * Display the specified datosadicionales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            Flash::error('Datosadicionales not found');

            return redirect(route('datosadicionales.index'));
        }

        return view('llamadas.datosadicionales.show')->with('datosadicionales', $datosadicionales);
    }

    /**
     * Show the form for editing the specified datosadicionales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            Flash::error('Datosadicionales not found');

            return redirect(route('datosadicionales.index'));
        }

        return view('llamadas.datosadicionales.edit')->with('datosadicionales', $datosadicionales);
    }

    /**
     * Update the specified datosadicionales in storage.
     *
     * @param int $id
     * @param UpdatedatosadicionalesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedatosadicionalesRequest $request)
    {
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            Flash::error('Datosadicionales not found');

            return redirect(route('datosadicionales.index'));
        }

        $datosadicionales = $this->datosadicionalesRepository->update($request->all(), $id);

        Flash::success('Datosadicionales updated successfully.');

        return redirect(route('datosadicionales.index'));
    }

    /**
     * Remove the specified datosadicionales from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $datosadicionales = $this->datosadicionalesRepository->find($id);

        if (empty($datosadicionales)) {
            Flash::error('Datosadicionales not found');

            return redirect(route('datosadicionales.index'));
        }

        $this->datosadicionalesRepository->delete($id);

        Flash::success('Datosadicionales deleted successfully.');

        return redirect(route('datosadicionales.index'));
    }
}
