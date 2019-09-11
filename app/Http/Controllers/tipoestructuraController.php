<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetipoestructuraRequest;
use App\Http\Requests\UpdatetipoestructuraRequest;
use App\Repositories\tipoestructuraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipoestructuraController extends AppBaseController
{
    /** @var  tipoestructuraRepository */
    private $tipoestructuraRepository;

    public function __construct(tipoestructuraRepository $tipoestructuraRepo)
    {
        $this->tipoestructuraRepository = $tipoestructuraRepo;
    }

    /**
     * Display a listing of the tipoestructura.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoestructuras = $this->tipoestructuraRepository->all();

        return view('tipoestructuras.index')
            ->with('tipoestructuras', $tipoestructuras);
    }

    /**
     * Show the form for creating a new tipoestructura.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipoestructuras.create');
    }

    /**
     * Store a newly created tipoestructura in storage.
     *
     * @param CreatetipoestructuraRequest $request
     *
     * @return Response
     */
    public function store(CreatetipoestructuraRequest $request)
    {
        $input = $request->all();

        $tipoestructura = $this->tipoestructuraRepository->create($input);

        Flash::success('Tipoestructura saved successfully.');

        return redirect(route('tipoestructuras.index'));
    }

    /**
     * Display the specified tipoestructura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoestructura = $this->tipoestructuraRepository->find($id);

        if (empty($tipoestructura)) {
            Flash::error('Tipoestructura not found');

            return redirect(route('tipoestructuras.index'));
        }

        return view('tipoestructuras.show')->with('tipoestructura', $tipoestructura);
    }

    /**
     * Show the form for editing the specified tipoestructura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoestructura = $this->tipoestructuraRepository->find($id);

        if (empty($tipoestructura)) {
            Flash::error('Tipoestructura not found');

            return redirect(route('tipoestructuras.index'));
        }

        return view('tipoestructuras.edit')->with('tipoestructura', $tipoestructura);
    }

    /**
     * Update the specified tipoestructura in storage.
     *
     * @param int $id
     * @param UpdatetipoestructuraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipoestructuraRequest $request)
    {
        $tipoestructura = $this->tipoestructuraRepository->find($id);

        if (empty($tipoestructura)) {
            Flash::error('Tipoestructura not found');

            return redirect(route('tipoestructuras.index'));
        }

        $tipoestructura = $this->tipoestructuraRepository->update($request->all(), $id);

        Flash::success('Tipoestructura updated successfully.');

        return redirect(route('tipoestructuras.index'));
    }

    /**
     * Remove the specified tipoestructura from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoestructura = $this->tipoestructuraRepository->find($id);

        if (empty($tipoestructura)) {
            Flash::error('Tipoestructura not found');

            return redirect(route('tipoestructuras.index'));
        }

        $this->tipoestructuraRepository->delete($id);

        Flash::success('Tipoestructura deleted successfully.');

        return redirect(route('tipoestructuras.index'));
    }
}
