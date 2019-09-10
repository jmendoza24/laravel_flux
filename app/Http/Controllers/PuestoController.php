<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePuestoRequest;
use App\Http\Requests\UpdatePuestoRequest;
use App\Repositories\PuestoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class PuestoController extends AppBaseController
{
    /** @var  PuestoRepository */
    private $puestoRepository;

    public function __construct(PuestoRepository $puestoRepo)
    {
        $this->puestoRepository = $puestoRepo;
    }

    /**
     * Display a listing of the Puesto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $puestos = $this->puestoRepository->all();

        return view('puestos.index')
            ->with('puestos', $puestos);
    }

    /**
     * Show the form for creating a new Puesto.
     *
     * @return Response
     */
    public function create()
    {
        return view('puestos.create');
    }

    /**
     * Store a newly created Puesto in storage.
     *
     * @param CreatePuestoRequest $request
     *
     * @return Response
     */
    public function store(CreatePuestoRequest $request)
    {
        $input = $request->all();

        $puesto = $this->puestoRepository->create($input);

        Flash::success('Puesto saved successfully.');

        return redirect(route('puestos.index'));
    }

    /**
     * Display the specified Puesto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $puesto = $this->puestoRepository->find($id);

        if (empty($puesto)) {
            Flash::error('Puesto not found');

            return redirect(route('puestos.index'));
        }

        return view('puestos.show')->with('puesto', $puesto);
    }

    /**
     * Show the form for editing the specified Puesto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $puesto = $this->puestoRepository->find($id);

        if (empty($puesto)) {
            Flash::error('Puesto not found');

            return redirect(route('puestos.index'));
        }

        return view('puestos.edit')->with('puesto', $puesto);
    }

    /**
     * Update the specified Puesto in storage.
     *
     * @param int $id
     * @param UpdatePuestoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePuestoRequest $request)
    {
        $puesto = $this->puestoRepository->find($id);

        if (empty($puesto)) {
            Flash::error('Puesto not found');

            return redirect(route('puestos.index'));
        }

        $puesto = $this->puestoRepository->update($request->all(), $id);

        Flash::success('Puesto updated successfully.');

        return redirect(route('puestos.index'));
    }

    /**
     * Remove the specified Puesto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){

        DB::table('puestos')->where('id',$id)->delete();
        return redirect(route('puestos.index'));
    }
}
