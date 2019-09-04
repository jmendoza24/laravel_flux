<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatelogisticaRequest;
use App\Http\Requests\UpdatelogisticaRequest;
use App\Repositories\logisticaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class logisticaController extends AppBaseController
{
    /** @var  logisticaRepository */
    private $logisticaRepository;

    public function __construct(logisticaRepository $logisticaRepo)
    {
        $this->logisticaRepository = $logisticaRepo;
    }

    /**
     * Display a listing of the logistica.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $logisticas = $this->logisticaRepository->all();

        return view('logisticas.index')
            ->with('logisticas', $logisticas);
    }

    /**
     * Show the form for creating a new logistica.
     *
     * @return Response
     */
    public function create()
    {
        return view('logisticas.create');
    }

    /**
     * Store a newly created logistica in storage.
     *
     * @param CreatelogisticaRequest $request
     *
     * @return Response
     */
    public function store(CreatelogisticaRequest $request)
    {
        $input = $request->all();

        $logistica = $this->logisticaRepository->create($input);

        Flash::success('Logistica saved successfully.');

        return redirect(route('logisticas.index'));
    }

    /**
     * Display the specified logistica.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logistica = $this->logisticaRepository->find($id);

        if (empty($logistica)) {
            Flash::error('Logistica not found');

            return redirect(route('logisticas.index'));
        }

        return view('logisticas.show')->with('logistica', $logistica);
    }

    /**
     * Show the form for editing the specified logistica.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logistica = $this->logisticaRepository->find($id);

        if (empty($logistica)) {
            Flash::error('Logistica not found');

            return redirect(route('logisticas.index'));
        }

        return view('logisticas.edit')->with('logistica', $logistica);
    }

    /**
     * Update the specified logistica in storage.
     *
     * @param int $id
     * @param UpdatelogisticaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelogisticaRequest $request)
    {
        $logistica = $this->logisticaRepository->find($id);

        if (empty($logistica)) {
            Flash::error('Logistica not found');

            return redirect(route('logisticas.index'));
        }

        $logistica = $this->logisticaRepository->update($request->all(), $id);

        Flash::success('Logistica updated successfully.');

        return redirect(route('logisticas.index'));
    }

    /**
     * Remove the specified logistica from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logistica = $this->logisticaRepository->find($id);

        if (empty($logistica)) {
            Flash::error('Logistica not found');

            return redirect(route('logisticas.index'));
        }

        $this->logisticaRepository->delete($id);

        Flash::success('Logistica deleted successfully.');

        return redirect(route('logisticas.index'));
    }
}
