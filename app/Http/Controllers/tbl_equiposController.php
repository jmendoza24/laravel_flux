<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtbl_equiposRequest;
use App\Http\Requests\Updatetbl_equiposRequest;
use App\Repositories\tbl_equiposRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tbl_equiposController extends AppBaseController
{
    /** @var  tbl_equiposRepository */
    private $tblEquiposRepository;

    public function __construct(tbl_equiposRepository $tblEquiposRepo)
    {
        $this->tblEquiposRepository = $tblEquiposRepo;
    }

    /**
     * Display a listing of the tbl_equipos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tblEquipos = $this->tblEquiposRepository->all();

        return view('tbl_equipos.index')
            ->with('tblEquipos', $tblEquipos);
    }

    /**
     * Show the form for creating a new tbl_equipos.
     *
     * @return Response
     */
    public function create()
    {
        return view('tbl_equipos.create');
    }

    /**
     * Store a newly created tbl_equipos in storage.
     *
     * @param Createtbl_equiposRequest $request
     *
     * @return Response
     */
    public function store(Createtbl_equiposRequest $request)
    {
        $input = $request->all();

        $tblEquipos = $this->tblEquiposRepository->create($input);

        Flash::success('Tbl Equipos saved successfully.');

        return redirect(route('tblEquipos.index'));
    }

    /**
     * Display the specified tbl_equipos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblEquipos = $this->tblEquiposRepository->find($id);

        if (empty($tblEquipos)) {
            Flash::error('Tbl Equipos not found');

            return redirect(route('tblEquipos.index'));
        }

        return view('tbl_equipos.show')->with('tblEquipos', $tblEquipos);
    }

    /**
     * Show the form for editing the specified tbl_equipos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblEquipos = $this->tblEquiposRepository->find($id);

        if (empty($tblEquipos)) {
            Flash::error('Tbl Equipos not found');

            return redirect(route('tblEquipos.index'));
        }

        return view('tbl_equipos.edit')->with('tblEquipos', $tblEquipos);
    }

    /**
     * Update the specified tbl_equipos in storage.
     *
     * @param int $id
     * @param Updatetbl_equiposRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetbl_equiposRequest $request)
    {
        $tblEquipos = $this->tblEquiposRepository->find($id);

        if (empty($tblEquipos)) {
            Flash::error('Tbl Equipos not found');

            return redirect(route('tblEquipos.index'));
        }

        $tblEquipos = $this->tblEquiposRepository->update($request->all(), $id);

        Flash::success('Tbl Equipos updated successfully.');

        return redirect(route('tblEquipos.index'));
    }

    /**
     * Remove the specified tbl_equipos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblEquipos = $this->tblEquiposRepository->find($id);

        if (empty($tblEquipos)) {
            Flash::error('Tbl Equipos not found');

            return redirect(route('tblEquipos.index'));
        }

        $this->tblEquiposRepository->delete($id);

        Flash::success('Tbl Equipos deleted successfully.');

        return redirect(route('tblEquipos.index'));
    }
}
