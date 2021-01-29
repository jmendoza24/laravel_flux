<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createcat_reportes_medicosRequest;
use App\Http\Requests\Updatecat_reportes_medicosRequest;
use App\Repositories\cat_reportes_medicosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class cat_reportes_medicosController extends AppBaseController
{
    /** @var  cat_reportes_medicosRepository */
    private $catReportesMedicosRepository;

    public function __construct(cat_reportes_medicosRepository $catReportesMedicosRepo)
    {
        $this->catReportesMedicosRepository = $catReportesMedicosRepo;
    }

    /**
     * Display a listing of the cat_reportes_medicos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catReportesMedicos = $this->catReportesMedicosRepository->all();

        return view('cat_reportes_medicos.index')
            ->with('catReportesMedicos', $catReportesMedicos);
    }

    /**
     * Show the form for creating a new cat_reportes_medicos.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_reportes_medicos.create');
    }

    /**
     * Store a newly created cat_reportes_medicos in storage.
     *
     * @param Createcat_reportes_medicosRequest $request
     *
     * @return Response
     */
    public function store(Createcat_reportes_medicosRequest $request)
    {
        $input = $request->all();

        $catReportesMedicos = $this->catReportesMedicosRepository->create($input);

        Flash::success('Cat Reportes Medicos saved successfully.');

        return redirect(route('catReportesMedicos.index'));
    }

    /**
     * Display the specified cat_reportes_medicos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catReportesMedicos = $this->catReportesMedicosRepository->find($id);

        if (empty($catReportesMedicos)) {
            Flash::error('Cat Reportes Medicos not found');

            return redirect(route('catReportesMedicos.index'));
        }

        return view('cat_reportes_medicos.show')->with('catReportesMedicos', $catReportesMedicos);
    }

    /**
     * Show the form for editing the specified cat_reportes_medicos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catReportesMedicos = $this->catReportesMedicosRepository->find($id);

        if (empty($catReportesMedicos)) {
            Flash::error('Cat Reportes Medicos not found');

            return redirect(route('catReportesMedicos.index'));
        }

        return view('cat_reportes_medicos.edit')->with('catReportesMedicos', $catReportesMedicos);
    }

    /**
     * Update the specified cat_reportes_medicos in storage.
     *
     * @param int $id
     * @param Updatecat_reportes_medicosRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecat_reportes_medicosRequest $request)
    {
        $catReportesMedicos = $this->catReportesMedicosRepository->find($id);

        if (empty($catReportesMedicos)) {
            Flash::error('Cat Reportes Medicos not found');

            return redirect(route('catReportesMedicos.index'));
        }

        $catReportesMedicos = $this->catReportesMedicosRepository->update($request->all(), $id);

        Flash::success('Cat Reportes Medicos updated successfully.');

        return redirect(route('catReportesMedicos.index'));
    }

    /**
     * Remove the specified cat_reportes_medicos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catReportesMedicos = $this->catReportesMedicosRepository->find($id);

        if (empty($catReportesMedicos)) {
            Flash::error('Cat Reportes Medicos not found');

            return redirect(route('catReportesMedicos.index'));
        }

        $this->catReportesMedicosRepository->delete($id);

        Flash::success('Cat Reportes Medicos deleted successfully.');

        return redirect(route('catReportesMedicos.index'));
    }
}
