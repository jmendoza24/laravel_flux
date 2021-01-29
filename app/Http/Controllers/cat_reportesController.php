<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createcat_reportesRequest;
use App\Http\Requests\Updatecat_reportesRequest;
use App\Repositories\cat_reportesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class cat_reportesController extends AppBaseController
{
    /** @var  cat_reportesRepository */
    private $catReportesRepository;

    public function __construct(cat_reportesRepository $catReportesRepo)
    {
        $this->catReportesRepository = $catReportesRepo;
    }

    /**
     * Display a listing of the cat_reportes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catReportes = $this->catReportesRepository->all();

        return view('cat_reportes.index')
            ->with('catReportes', $catReportes);
    }

    /**
     * Show the form for creating a new cat_reportes.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_reportes.create');
    }

    /**
     * Store a newly created cat_reportes in storage.
     *
     * @param Createcat_reportesRequest $request
     *
     * @return Response
     */
    public function store(Createcat_reportesRequest $request)
    {
        $input = $request->all();

        $catReportes = $this->catReportesRepository->create($input);

        Flash::success('Cat Reportes saved successfully.');

        return redirect(route('catReportes.index'));
    }

    /**
     * Display the specified cat_reportes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catReportes = $this->catReportesRepository->find($id);

        if (empty($catReportes)) {
            Flash::error('Cat Reportes not found');

            return redirect(route('catReportes.index'));
        }

        return view('cat_reportes.show')->with('catReportes', $catReportes);
    }

    /**
     * Show the form for editing the specified cat_reportes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catReportes = $this->catReportesRepository->find($id);

        if (empty($catReportes)) {
            Flash::error('Cat Reportes not found');

            return redirect(route('catReportes.index'));
        }

        return view('cat_reportes.edit')->with('catReportes', $catReportes);
    }

    /**
     * Update the specified cat_reportes in storage.
     *
     * @param int $id
     * @param Updatecat_reportesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecat_reportesRequest $request)
    {
        $catReportes = $this->catReportesRepository->find($id);

        if (empty($catReportes)) {
            Flash::error('Cat Reportes not found');

            return redirect(route('catReportes.index'));
        }

        $catReportes = $this->catReportesRepository->update($request->all(), $id);

        Flash::success('Cat Reportes updated successfully.');

        return redirect(route('catReportes.index'));
    }

    /**
     * Remove the specified cat_reportes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catReportes = $this->catReportesRepository->find($id);

        if (empty($catReportes)) {
            Flash::error('Cat Reportes not found');

            return redirect(route('catReportes.index'));
        }

        $this->catReportesRepository->delete($id);

        Flash::success('Cat Reportes deleted successfully.');

        return redirect(route('catReportes.index'));
    }
}
