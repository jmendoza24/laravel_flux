<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecondicionesRequest;
use App\Http\Requests\UpdatecondicionesRequest;
use App\Repositories\condicionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class condicionesController extends AppBaseController
{
    /** @var  condicionesRepository */
    private $condicionesRepository;

    public function __construct(condicionesRepository $condicionesRepo)
    {
        $this->condicionesRepository = $condicionesRepo;
    }

    /**
     * Display a listing of the condiciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $condiciones = $this->condicionesRepository->all();

        return view('condiciones.index')
            ->with('condiciones', $condiciones);
    }

    /**
     * Show the form for creating a new condiciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('condiciones.create');
    }

    /**
     * Store a newly created condiciones in storage.
     *
     * @param CreatecondicionesRequest $request
     *
     * @return Response
     */
    public function store(CreatecondicionesRequest $request)
    {
        $input = $request->all();

        $condiciones = $this->condicionesRepository->create($input);

        Flash::success('Condiciones saved successfully.');

        return redirect(route('condiciones.index'));
    }

    /**
     * Display the specified condiciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $condiciones = $this->condicionesRepository->find($id);

        if (empty($condiciones)) {
            Flash::error('Condiciones not found');

            return redirect(route('condiciones.index'));
        }

        return view('condiciones.show')->with('condiciones', $condiciones);
    }

    /**
     * Show the form for editing the specified condiciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $condiciones = $this->condicionesRepository->find($id);

        if (empty($condiciones)) {
            Flash::error('Condiciones not found');

            return redirect(route('condiciones.index'));
        }

        return view('condiciones.edit')->with('condiciones', $condiciones);
    }

    /**
     * Update the specified condiciones in storage.
     *
     * @param int $id
     * @param UpdatecondicionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecondicionesRequest $request)
    {
        $condiciones = $this->condicionesRepository->find($id);

        if (empty($condiciones)) {
            Flash::error('Condiciones not found');

            return redirect(route('condiciones.index'));
        }

        $condiciones = $this->condicionesRepository->update($request->all(), $id);

        Flash::success('Condiciones updated successfully.');

        return redirect(route('condiciones.index'));
    }

    /**
     * Remove the specified condiciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $condiciones = $this->condicionesRepository->find($id);

        if (empty($condiciones)) {
            Flash::error('Condiciones not found');

            return redirect(route('condiciones.index'));
        }

        $this->condicionesRepository->delete($id);

        Flash::success('Condiciones deleted successfully.');

        return redirect(route('condiciones.index'));
    }
}
