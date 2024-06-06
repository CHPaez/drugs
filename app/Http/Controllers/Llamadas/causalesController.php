<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreatecausalesRequest;
use App\Http\Requests\UpdatecausalesRequest;
use App\Repositories\causalesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class causalesController extends AppBaseController
{
    /** @var causalesRepository $causalesRepository*/
    private $causalesRepository;

    public function __construct(causalesRepository $causalesRepo)
    {
        $this->causalesRepository = $causalesRepo;
    }

    /**
     * Display a listing of the causales.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $causales = $this->causalesRepository->all();

        return view('llamadas.causales.index')
            ->with('causales', $causales);
    }

    /**
     * Show the form for creating a new causales.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.causales.create');
    }

    /**
     * Store a newly created causales in storage.
     *
     * @param CreatecausalesRequest $request
     *
     * @return Response
     */
    public function store(CreatecausalesRequest $request)
    {
        $input = $request->all();

        $causales = $this->causalesRepository->create($input);

        Flash::success('Causales saved successfully.');

        return redirect(route('causales.index'));
    }

    /**
     * Display the specified causales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $causales = $this->causalesRepository->find($id);

        if (empty($causales)) {
            Flash::error('Causales not found');

            return redirect(route('causales.index'));
        }

        return view('llamadas.causales.show')->with('causales', $causales);
    }

    /**
     * Show the form for editing the specified causales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $causales = $this->causalesRepository->find($id);

        if (empty($causales)) {
            Flash::error('Causales not found');

            return redirect(route('causales.index'));
        }

        return view('llamadas.causales.edit')->with('causales', $causales);
    }

    /**
     * Update the specified causales in storage.
     *
     * @param int $id
     * @param UpdatecausalesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecausalesRequest $request)
    {
        $causales = $this->causalesRepository->find($id);

        if (empty($causales)) {
            Flash::error('Causales not found');

            return redirect(route('causales.index'));
        }

        $causales = $this->causalesRepository->update($request->all(), $id);

        Flash::success('Causales updated successfully.');

        return redirect(route('causales.index'));
    }

    /**
     * Remove the specified causales from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $causales = $this->causalesRepository->find($id);

        if (empty($causales)) {
            Flash::error('Causales not found');

            return redirect(route('causales.index'));
        }

        $this->causalesRepository->delete($id);

        Flash::success('Causales deleted successfully.');

        return redirect(route('causales.index'));
    }
}
