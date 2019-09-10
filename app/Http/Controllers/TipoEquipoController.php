<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoEquipoRequest;
use App\Http\Requests\UpdateTipoEquipoRequest;
use App\Repositories\TipoEquipoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipoEquipoController extends AppBaseController
{
    /** @var  TipoEquipoRepository */
    private $tipoEquipoRepository;

    public function __construct(TipoEquipoRepository $tipoEquipoRepo)
    {
        $this->tipoEquipoRepository = $tipoEquipoRepo;
    }

    /**
     * Display a listing of the TipoEquipo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoEquipos = $this->tipoEquipoRepository->all();

        return view('tipo_equipos.index')
            ->with('tipoEquipos', $tipoEquipos);
    }

    /**
     * Show the form for creating a new TipoEquipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_equipos.create');
    }

    /**
     * Store a newly created TipoEquipo in storage.
     *
     * @param CreateTipoEquipoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoEquipoRequest $request)
    {
        $input = $request->all();

        $tipoEquipo = $this->tipoEquipoRepository->create($input);

        Flash::success('Tipo Equipo saved successfully.');

        return redirect(route('tipoEquipos.index'));
    }

    /**
     * Display the specified TipoEquipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            Flash::error('Tipo Equipo not found');

            return redirect(route('tipoEquipos.index'));
        }

        return view('tipo_equipos.show')->with('tipoEquipo', $tipoEquipo);
    }

    /**
     * Show the form for editing the specified TipoEquipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            Flash::error('Tipo Equipo not found');

            return redirect(route('tipoEquipos.index'));
        }

        return view('tipo_equipos.edit')->with('tipoEquipo', $tipoEquipo);
    }

    /**
     * Update the specified TipoEquipo in storage.
     *
     * @param int $id
     * @param UpdateTipoEquipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoEquipoRequest $request)
    {
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            Flash::error('Tipo Equipo not found');

            return redirect(route('tipoEquipos.index'));
        }

        $tipoEquipo = $this->tipoEquipoRepository->update($request->all(), $id);

        Flash::success('Tipo Equipo updated successfully.');

        return redirect(route('tipoEquipos.index'));
    }

    /**
     * Remove the specified TipoEquipo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            Flash::error('Tipo Equipo not found');

            return redirect(route('tipoEquipos.index'));
        }

        $this->tipoEquipoRepository->delete($id);

        Flash::success('Tipo Equipo deleted successfully.');

        return redirect(route('tipoEquipos.index'));
    }
}
