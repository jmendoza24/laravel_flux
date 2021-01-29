<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedepartamentoRequest;
use App\Http\Requests\UpdatedepartamentoRequest;
use App\Repositories\departamentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class departamentoController extends AppBaseController
{
    /** @var  departamentoRepository */
    private $departamentoRepository;

    public function __construct(departamentoRepository $departamentoRepo)
    {
        $this->departamentoRepository = $departamentoRepo;
    }

    /**
     * Display a listing of the departamento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $departamentos = $this->departamentoRepository->all();

        return view('departamentos.index')
            ->with('departamentos', $departamentos);
    }

    /**
     * Show the form for creating a new departamento.
     *
     * @return Response
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created departamento in storage.
     *
     * @param CreatedepartamentoRequest $request
     *
     * @return Response
     */
    public function store(CreatedepartamentoRequest $request)
    {
        $input = $request->all();

        $departamento = $this->departamentoRepository->create($input);

        Flash::success('Departamento saved successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Display the specified departamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departamento = $this->departamentoRepository->find($id);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.show')->with('departamento', $departamento);
    }

    /**
     * Show the form for editing the specified departamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departamento = $this->departamentoRepository->find($id);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.edit')->with('departamento', $departamento);
    }

    /**
     * Update the specified departamento in storage.
     *
     * @param int $id
     * @param UpdatedepartamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedepartamentoRequest $request)
    {
        $departamento = $this->departamentoRepository->find($id);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        $departamento = $this->departamentoRepository->update($request->all(), $id);

        Flash::success('Departamento updated successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified departamento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamento = $this->departamentoRepository->find($id);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        $this->departamentoRepository->delete($id);

        Flash::success('Departamento deleted successfully.');

        return redirect(route('departamentos.index'));
    }
}
