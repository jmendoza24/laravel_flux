<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartamentosRequest;
use App\Http\Requests\UpdateDepartamentosRequest;
use App\Repositories\DepartamentosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DepartamentosController extends AppBaseController
{
    /** @var  DepartamentosRepository */
    private $departamentosRepository;

    public function __construct(DepartamentosRepository $departamentosRepo)
    {
        $this->departamentosRepository = $departamentosRepo;
    }

    /**
     * Display a listing of the Departamentos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $departamentos = $this->departamentosRepository->all();

        return view('departamentos.index')
            ->with('departamentos', $departamentos);
    }

    /**
     * Show the form for creating a new Departamentos.
     *
     * @return Response
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created Departamentos in storage.
     *
     * @param CreateDepartamentosRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartamentosRequest $request)
    {
        $input = $request->all();

        $departamentos = $this->departamentosRepository->create($input);

        Flash::success('Departamentos saved successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Display the specified Departamentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.show')->with('departamentos', $departamentos);
    }

    /**
     * Show the form for editing the specified Departamentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.edit')->with('departamentos', $departamentos);
    }

    /**
     * Update the specified Departamentos in storage.
     *
     * @param int $id
     * @param UpdateDepartamentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartamentosRequest $request)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        $departamentos = $this->departamentosRepository->update($request->all(), $id);

        Flash::success('Departamentos updated successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified Departamentos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error('Departamentos not found');

            return redirect(route('departamentos.index'));
        }

        $this->departamentosRepository->delete($id);

        Flash::success('Departamentos deleted successfully.');

        return redirect(route('departamentos.index'));
    }
}
