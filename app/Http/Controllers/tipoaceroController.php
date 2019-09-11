<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetipoaceroRequest;
use App\Http\Requests\UpdatetipoaceroRequest;
use App\Repositories\tipoaceroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipoaceroController extends AppBaseController
{
    /** @var  tipoaceroRepository */
    private $tipoaceroRepository;

    public function __construct(tipoaceroRepository $tipoaceroRepo)
    {
        $this->tipoaceroRepository = $tipoaceroRepo;
    }

    /**
     * Display a listing of the tipoacero.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoaceros = $this->tipoaceroRepository->all();

        return view('tipoaceros.index')
            ->with('tipoaceros', $tipoaceros);
    }

    /**
     * Show the form for creating a new tipoacero.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipoaceros.create');
    }

    /**
     * Store a newly created tipoacero in storage.
     *
     * @param CreatetipoaceroRequest $request
     *
     * @return Response
     */
    public function store(CreatetipoaceroRequest $request)
    {
        $input = $request->all();

        $tipoacero = $this->tipoaceroRepository->create($input);

        Flash::success('Tipoacero saved successfully.');

        return redirect(route('tipoaceros.index'));
    }

    /**
     * Display the specified tipoacero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoacero = $this->tipoaceroRepository->find($id);

        if (empty($tipoacero)) {
            Flash::error('Tipoacero not found');

            return redirect(route('tipoaceros.index'));
        }

        return view('tipoaceros.show')->with('tipoacero', $tipoacero);
    }

    /**
     * Show the form for editing the specified tipoacero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoacero = $this->tipoaceroRepository->find($id);

        if (empty($tipoacero)) {
            Flash::error('Tipoacero not found');

            return redirect(route('tipoaceros.index'));
        }

        return view('tipoaceros.edit')->with('tipoacero', $tipoacero);
    }

    /**
     * Update the specified tipoacero in storage.
     *
     * @param int $id
     * @param UpdatetipoaceroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipoaceroRequest $request)
    {
        $tipoacero = $this->tipoaceroRepository->find($id);

        if (empty($tipoacero)) {
            Flash::error('Tipoacero not found');

            return redirect(route('tipoaceros.index'));
        }

        $tipoacero = $this->tipoaceroRepository->update($request->all(), $id);

        Flash::success('Tipoacero updated successfully.');

        return redirect(route('tipoaceros.index'));
    }

    /**
     * Remove the specified tipoacero from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoacero = $this->tipoaceroRepository->find($id);

        if (empty($tipoacero)) {
            Flash::error('Tipoacero not found');

            return redirect(route('tipoaceros.index'));
        }

        $this->tipoaceroRepository->delete($id);

        Flash::success('Tipoacero deleted successfully.');

        return redirect(route('tipoaceros.index'));
    }
}
