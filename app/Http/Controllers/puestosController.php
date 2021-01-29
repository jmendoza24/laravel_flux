<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepuestosRequest;
use App\Http\Requests\UpdatepuestosRequest;
use App\Repositories\puestosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class puestosController extends AppBaseController
{
    /** @var  puestosRepository */
    private $puestosRepository;

    public function __construct(puestosRepository $puestosRepo)
    {
        $this->puestosRepository = $puestosRepo;
    }

    /**
     * Display a listing of the puestos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $puestos = $this->puestosRepository->all();

        return view('puestos.index')
            ->with('puestos', $puestos);
    }

    /**
     * Show the form for creating a new puestos.
     *
     * @return Response
     */
    public function create()
    {
        return view('puestos.create');
    }

    /**
     * Store a newly created puestos in storage.
     *
     * @param CreatepuestosRequest $request
     *
     * @return Response
     */
    public function store(CreatepuestosRequest $request)
    {
        $input = $request->all();

        $puestos = $this->puestosRepository->create($input);

        Flash::success('Puestos saved successfully.');

        return redirect(route('puestos.index'));
    }

    /**
     * Display the specified puestos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $puestos = $this->puestosRepository->find($id);

        if (empty($puestos)) {
            Flash::error('Puestos not found');

            return redirect(route('puestos.index'));
        }

        return view('puestos.show')->with('puestos', $puestos);
    }

    /**
     * Show the form for editing the specified puestos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $puestos = $this->puestosRepository->find($id);

        if (empty($puestos)) {
            Flash::error('Puestos not found');

            return redirect(route('puestos.index'));
        }

        return view('puestos.edit')->with('puestos', $puestos);
    }

    /**
     * Update the specified puestos in storage.
     *
     * @param int $id
     * @param UpdatepuestosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepuestosRequest $request)
    {
        $puestos = $this->puestosRepository->find($id);

        if (empty($puestos)) {
            Flash::error('Puestos not found');

            return redirect(route('puestos.index'));
        }

        $puestos = $this->puestosRepository->update($request->all(), $id);

        Flash::success('Puestos updated successfully.');

        return redirect(route('puestos.index'));
    }

    /**
     * Remove the specified puestos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $puestos = $this->puestosRepository->find($id);

        if (empty($puestos)) {
            Flash::error('Puestos not found');

            return redirect(route('puestos.index'));
        }

        $this->puestosRepository->delete($id);

        Flash::success('Puestos deleted successfully.');

        return redirect(route('puestos.index'));
    }
}
