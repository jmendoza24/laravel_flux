<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createcat_incidenciasRequest;
use App\Http\Requests\Updatecat_incidenciasRequest;
use App\Repositories\cat_incidenciasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class cat_incidenciasController extends AppBaseController
{
    /** @var  cat_incidenciasRepository */
    private $catIncidenciasRepository;

    public function __construct(cat_incidenciasRepository $catIncidenciasRepo)
    {
        $this->catIncidenciasRepository = $catIncidenciasRepo;
    }

    /**
     * Display a listing of the cat_incidencias.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catIncidencias = $this->catIncidenciasRepository->all();

        return view('cat_incidencias.index')
            ->with('catIncidencias', $catIncidencias);
    }

    /**
     * Show the form for creating a new cat_incidencias.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_incidencias.create');
    }

    /**
     * Store a newly created cat_incidencias in storage.
     *
     * @param Createcat_incidenciasRequest $request
     *
     * @return Response
     */
    public function store(Createcat_incidenciasRequest $request)
    {
        $input = $request->all();

        $catIncidencias = $this->catIncidenciasRepository->create($input);

        Flash::success('Cat Incidencias saved successfully.');

        return redirect(route('catIncidencias.index'));
    }

    /**
     * Display the specified cat_incidencias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catIncidencias = $this->catIncidenciasRepository->find($id);

        if (empty($catIncidencias)) {
            Flash::error('Cat Incidencias not found');

            return redirect(route('catIncidencias.index'));
        }

        return view('cat_incidencias.show')->with('catIncidencias', $catIncidencias);
    }

    /**
     * Show the form for editing the specified cat_incidencias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catIncidencias = $this->catIncidenciasRepository->find($id);

        if (empty($catIncidencias)) {
            Flash::error('Cat Incidencias not found');

            return redirect(route('catIncidencias.index'));
        }

        return view('cat_incidencias.edit')->with('catIncidencias', $catIncidencias);
    }

    /**
     * Update the specified cat_incidencias in storage.
     *
     * @param int $id
     * @param Updatecat_incidenciasRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecat_incidenciasRequest $request)
    {
        $catIncidencias = $this->catIncidenciasRepository->find($id);

        if (empty($catIncidencias)) {
            Flash::error('Cat Incidencias not found');

            return redirect(route('catIncidencias.index'));
        }

        $catIncidencias = $this->catIncidenciasRepository->update($request->all(), $id);

        Flash::success('Cat Incidencias updated successfully.');

        return redirect(route('catIncidencias.index'));
    }

    /**
     * Remove the specified cat_incidencias from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catIncidencias = $this->catIncidenciasRepository->find($id);

        if (empty($catIncidencias)) {
            Flash::error('Cat Incidencias not found');

            return redirect(route('catIncidencias.index'));
        }

        $this->catIncidenciasRepository->delete($id);

        Flash::success('Cat Incidencias deleted successfully.');

        return redirect(route('catIncidencias.index'));
    }
}
