<?php

namespace App\Http\Controllers\Llamadas;

use App\Http\Requests\CreatehorariosRequest;
use App\Http\Requests\UpdatehorariosRequest;
use App\Repositories\horariosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class horariosController extends AppBaseController
{
    /** @var horariosRepository $horariosRepository*/
    private $horariosRepository;

    public function __construct(horariosRepository $horariosRepo)
    {
        $this->horariosRepository = $horariosRepo;
    }

    /**
     * Display a listing of the horarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $horarios = $this->horariosRepository->all();

        return view('llamadas.horarios.index')
            ->with('horarios', $horarios);
    }

    /**
     * Show the form for creating a new horarios.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamadas.horarios.create');
    }

    /**
     * Store a newly created horarios in storage.
     *
     * @param CreatehorariosRequest $request
     *
     * @return Response
     */
    public function store(CreatehorariosRequest $request)
    {
        $input = $request->all();

        $horarios = $this->horariosRepository->create($input);

        Flash::success('Horarios saved successfully.');

        return redirect(route('horarios.index'));
    }

    /**
     * Display the specified horarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            Flash::error('Horarios not found');

            return redirect(route('horarios.index'));
        }

        return view('llamadas.horarios.show')->with('horarios', $horarios);
    }

    /**
     * Show the form for editing the specified horarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            Flash::error('Horarios not found');

            return redirect(route('horarios.index'));
        }

        return view('llamadas.horarios.edit')->with('horarios', $horarios);
    }

    /**
     * Update the specified horarios in storage.
     *
     * @param int $id
     * @param UpdatehorariosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehorariosRequest $request)
    {
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            Flash::error('Horarios not found');

            return redirect(route('horarios.index'));
        }

        $horarios = $this->horariosRepository->update($request->all(), $id);

        Flash::success('Horarios updated successfully.');

        return redirect(route('horarios.index'));
    }

    /**
     * Remove the specified horarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $horarios = $this->horariosRepository->find($id);

        if (empty($horarios)) {
            Flash::error('Horarios not found');

            return redirect(route('horarios.index'));
        }

        $this->horariosRepository->delete($id);

        Flash::success('Horarios deleted successfully.');

        return redirect(route('horarios.index'));
    }
}
