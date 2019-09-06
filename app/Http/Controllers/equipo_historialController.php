<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createequipo_historialRequest;
use App\Http\Requests\Updateequipo_historialRequest;
use App\Repositories\equipo_historialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class equipo_historialController extends AppBaseController
{
    /** @var  equipo_historialRepository */
    private $equipoHistorialRepository;

    public function __construct(equipo_historialRepository $equipoHistorialRepo)
    {
        $this->equipoHistorialRepository = $equipoHistorialRepo;
    }

    /**
     * Display a listing of the equipo_historial.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $equipoHistorials = $this->equipoHistorialRepository->all();

        return view('equipo_historials.index')
            ->with('equipoHistorials', $equipoHistorials);
    }

    /**
     * Show the form for creating a new equipo_historial.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipo_historials.create');
    }

    /**
     * Store a newly created equipo_historial in storage.
     *
     * @param Createequipo_historialRequest $request
     *
     * @return Response
     */
    public function store(Createequipo_historialRequest $request)
    {
        $input = $request->all();

        $equipoHistorial = $this->equipoHistorialRepository->create($input);

        Flash::success('Equipo Historial saved successfully.');

        return redirect(route('equipoHistorials.index'));
    }

    /**
     * Display the specified equipo_historial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipoHistorial = $this->equipoHistorialRepository->find($id);

        if (empty($equipoHistorial)) {
            Flash::error('Equipo Historial not found');

            return redirect(route('equipoHistorials.index'));
        }

        return view('equipo_historials.show')->with('equipoHistorial', $equipoHistorial);
    }

    /**
     * Show the form for editing the specified equipo_historial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipoHistorial = $this->equipoHistorialRepository->find($id);

        if (empty($equipoHistorial)) {
            Flash::error('Equipo Historial not found');

            return redirect(route('equipoHistorials.index'));
        }

        return view('equipo_historials.edit')->with('equipoHistorial', $equipoHistorial);
    }

    /**
     * Update the specified equipo_historial in storage.
     *
     * @param int $id
     * @param Updateequipo_historialRequest $request
     *
     * @return Response
     */
    public function update($id, Updateequipo_historialRequest $request)
    {
        $equipoHistorial = $this->equipoHistorialRepository->find($id);

        if (empty($equipoHistorial)) {
            Flash::error('Equipo Historial not found');

            return redirect(route('equipoHistorials.index'));
        }

        $equipoHistorial = $this->equipoHistorialRepository->update($request->all(), $id);

        Flash::success('Equipo Historial updated successfully.');

        return redirect(route('equipoHistorials.index'));
    }

    /**
     * Remove the specified equipo_historial from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipoHistorial = $this->equipoHistorialRepository->find($id);

        if (empty($equipoHistorial)) {
            Flash::error('Equipo Historial not found');

            return redirect(route('equipoHistorials.index'));
        }

        $this->equipoHistorialRepository->delete($id);

        Flash::success('Equipo Historial deleted successfully.');

        return redirect(route('equipoHistorials.index'));
    }
}
