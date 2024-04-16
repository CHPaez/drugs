<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepaisesRequest;
use App\Http\Requests\UpdatepaisesRequest;
use App\Repositories\paisesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class paisesController extends AppBaseController
{
    /** @var paisesRepository $paisesRepository*/
    private $paisesRepository;

    public function __construct(paisesRepository $paisesRepo)
    {
        $this->paisesRepository = $paisesRepo;
    }

    /**
     * Display a listing of the paises.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $paises = $this->paisesRepository->all();

        return view('paises.index')
            ->with('paises', $paises);
    }

    /**
     * Show the form for creating a new paises.
     *
     * @return Response
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created paises in storage.
     *
     * @param CreatepaisesRequest $request
     *
     * @return Response
     */
    public function store(CreatepaisesRequest $request)
    {
        $input = $request->all();

        $paises = $this->paisesRepository->create($input);

        Flash::success('Paises saved successfully.');

        return redirect(route('paises.index'));
    }

    /**
     * Display the specified paises.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        return view('paises.show')->with('paises', $paises);
    }

    /**
     * Show the form for editing the specified paises.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        return view('paises.edit')->with('paises', $paises);
    }

    /**
     * Update the specified paises in storage.
     *
     * @param int $id
     * @param UpdatepaisesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepaisesRequest $request)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        $paises = $this->paisesRepository->update($request->all(), $id);

        Flash::success('Paises updated successfully.');

        return redirect(route('paises.index'));
    }

    /**
     * Remove the specified paises from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        $this->paisesRepository->delete($id);

        Flash::success('Paises deleted successfully.');

        return redirect(route('paises.index'));
    }
}
