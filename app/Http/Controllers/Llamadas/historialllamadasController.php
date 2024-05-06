<?php

namespace App\Http\Controllers\Llamadas;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CreatehistorialllamadasRequest;
use App\Http\Requests\UpdatehistorialllamadasRequest;
use App\Repositories\historialllamadasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class historialllamadasController extends AppBaseController
{
    /** @var historialllamadasRepository $historialllamadasRepository*/
    private $historialllamadasRepository;

    public function __construct(historialllamadasRepository $historialllamadasRepo)
    {
        $this->historialllamadasRepository = $historialllamadasRepo;
    }

    /**
     * Display a listing of the historialllamadas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $historialllamadas = $this->historialllamadasRepository->all();

        return view('llamadas.historialllamadas.index')
            ->with('historialllamadas', $historialllamadas);
    }

    /**
     * Show the form for creating a new historialllamadas.
     *
     * @return Response
     */
    public function create()
    {

        // Obtener el nombre del usuario de la sesi�n actual
    $userId =  Auth::id();

        return view('llamadas.historialllamadas.create')
        ->with('userId', $userId);
    }

    /**
     * Store a newly created historialllamadas in storage.
     *
     * @param CreatehistorialllamadasRequest $request
     *
     * @return Response
     */
    public function store(CreatehistorialllamadasRequest $request)
    {
        $input = $request->all();

        $historialllamadas = $this->historialllamadasRepository->create($input);

        Flash::success('Historialllamadas saved successfully.');

        return redirect(route('historialllamadas.index'));
    }

    /**
     * Display the specified historialllamadas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historialllamadas = $this->historialllamadasRepository->find($id);

        if (empty($historialllamadas)) {
            Flash::error('Historialllamadas not found');

            return redirect(route('historialllamadas.index'));
        }

        return view('llamadas.historialllamadas.show')->with('historialllamadas', $historialllamadas);
    }

    /**
     * Show the form for editing the specified historialllamadas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historialllamadas = $this->historialllamadasRepository->find($id);

        if (empty($historialllamadas)) {
            Flash::error('Historialllamadas not found');

            return redirect(route('historialllamadas.index'));
        }

        return view('llamadas.historialllamadas.edit')->with('historialllamadas', $historialllamadas);
    }

    /**
     * Update the specified historialllamadas in storage.
     *
     * @param int $id
     * @param UpdatehistorialllamadasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehistorialllamadasRequest $request)
    {
        $historialllamadas = $this->historialllamadasRepository->find($id);

        if (empty($historialllamadas)) {
            Flash::error('Historialllamadas not found');

            return redirect(route('historialllamadas.index'));
        }

        $historialllamadas = $this->historialllamadasRepository->update($request->all(), $id);

        Flash::success('Historialllamadas updated successfully.');

        return redirect(route('historialllamadas.index'));
    }

    /**
     * Remove the specified historialllamadas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historialllamadas = $this->historialllamadasRepository->find($id);

        if (empty($historialllamadas)) {
            Flash::error('Historialllamadas not found');

            return redirect(route('historialllamadas.index'));
        }

        $this->historialllamadasRepository->delete($id);

        Flash::success('Historialllamadas deleted successfully.');

        return redirect(route('historialllamadas.index'));
    }
}
