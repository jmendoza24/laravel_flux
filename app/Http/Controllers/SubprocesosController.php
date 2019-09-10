<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubprocesosRequest;
use App\Http\Requests\UpdateSubprocesosRequest;
use App\Repositories\SubprocesosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubprocesosController extends AppBaseController
{
    /** @var  SubprocesosRepository */
    private $subprocesosRepository;

    public function __construct(SubprocesosRepository $subprocesosRepo)
    {
        $this->subprocesosRepository = $subprocesosRepo;
    }

    /**
     * Display a listing of the Subprocesos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subprocesos = $this->subprocesosRepository->all();

        return view('subprocesos.index')
            ->with('subprocesos', $subprocesos);
    }

    /**
     * Show the form for creating a new Subprocesos.
     *
     * @return Response
     */
    public function create()
    {
        return view('subprocesos.create');
    }

    /**
     * Store a newly created Subprocesos in storage.
     *
     * @param CreateSubprocesosRequest $request
     *
     * @return Response
     */
    public function store(CreateSubprocesosRequest $request)
    {
        $input = $request->all();

        $subprocesos = $this->subprocesosRepository->create($input);

        Flash::success('Subprocesos saved successfully.');

        return redirect(route('subprocesos.index'));
    }

    /**
     * Display the specified Subprocesos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subprocesos = $this->subprocesosRepository->find($id);

        if (empty($subprocesos)) {
            Flash::error('Subprocesos not found');

            return redirect(route('subprocesos.index'));
        }

        return view('subprocesos.show')->with('subprocesos', $subprocesos);
    }

    /**
     * Show the form for editing the specified Subprocesos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subprocesos = $this->subprocesosRepository->find($id);

        if (empty($subprocesos)) {
            Flash::error('Subprocesos not found');

            return redirect(route('subprocesos.index'));
        }

        return view('subprocesos.edit')->with('subprocesos', $subprocesos);
    }

    /**
     * Update the specified Subprocesos in storage.
     *
     * @param int $id
     * @param UpdateSubprocesosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubprocesosRequest $request)
    {
        $subprocesos = $this->subprocesosRepository->find($id);

        if (empty($subprocesos)) {
            Flash::error('Subprocesos not found');

            return redirect(route('subprocesos.index'));
        }

        $subprocesos = $this->subprocesosRepository->update($request->all(), $id);

        Flash::success('Subprocesos updated successfully.');

        return redirect(route('subprocesos.index'));
    }

    /**
     * Remove the specified Subprocesos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subprocesos = $this->subprocesosRepository->find($id);

        if (empty($subprocesos)) {
            Flash::error('Subprocesos not found');

            return redirect(route('subprocesos.index'));
        }

        $this->subprocesosRepository->delete($id);

        Flash::success('Subprocesos deleted successfully.');

        return redirect(route('subprocesos.index'));
    }
}
