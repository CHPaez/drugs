<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetipostelefonosRequest;
use App\Http\Requests\UpdatetipostelefonosRequest;
use App\Repositories\tipostelefonosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipostelefonosController extends AppBaseController
{
    /** @var tipostelefonosRepository $tipostelefonosRepository*/
    private $tipostelefonosRepository;

    public function __construct(tipostelefonosRepository $tipostelefonosRepo)
    {
        $this->tipostelefonosRepository = $tipostelefonosRepo;
    }

    /**
     * Display a listing of the tipostelefonos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipostelefonos = $this->tipostelefonosRepository->all();

        return view('tipostelefonos.index')
            ->with('tipostelefonos', $tipostelefonos);
    }

    /**
     * Show the form for creating a new tipostelefonos.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipostelefonos.create');
    }

    /**
     * Store a newly created tipostelefonos in storage.
     *
     * @param CreatetipostelefonosRequest $request
     *
     * @return Response
     */
    public function store(CreatetipostelefonosRequest $request)
    {
        $input = $request->all();

        $tipostelefonos = $this->tipostelefonosRepository->create($input);

        Flash::success('Tipostelefonos saved successfully.');

        return redirect(route('tipostelefonos.index'));
    }

    /**
     * Display the specified tipostelefonos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            Flash::error('Tipostelefonos not found');

            return redirect(route('tipostelefonos.index'));
        }

        return view('tipostelefonos.show')->with('tipostelefonos', $tipostelefonos);
    }

    /**
     * Show the form for editing the specified tipostelefonos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            Flash::error('Tipostelefonos not found');

            return redirect(route('tipostelefonos.index'));
        }

        return view('tipostelefonos.edit')->with('tipostelefonos', $tipostelefonos);
    }

    /**
     * Update the specified tipostelefonos in storage.
     *
     * @param int $id
     * @param UpdatetipostelefonosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipostelefonosRequest $request)
    {
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            Flash::error('Tipostelefonos not found');

            return redirect(route('tipostelefonos.index'));
        }

        $tipostelefonos = $this->tipostelefonosRepository->update($request->all(), $id);

        Flash::success('Tipostelefonos updated successfully.');

        return redirect(route('tipostelefonos.index'));
    }

    /**
     * Remove the specified tipostelefonos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipostelefonos = $this->tipostelefonosRepository->find($id);

        if (empty($tipostelefonos)) {
            Flash::error('Tipostelefonos not found');

            return redirect(route('tipostelefonos.index'));
        }

        $this->tipostelefonosRepository->delete($id);

        Flash::success('Tipostelefonos deleted successfully.');

        return redirect(route('tipostelefonos.index'));
    }
}
