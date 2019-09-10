<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFamiliaRequest;
use App\Http\Requests\UpdateFamiliaRequest;
use App\Repositories\FamiliaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FamiliaController extends AppBaseController
{
    /** @var  FamiliaRepository */
    private $familiaRepository;

    public function __construct(FamiliaRepository $familiaRepo)
    {
        $this->familiaRepository = $familiaRepo;
    }

    /**
     * Display a listing of the Familia.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $familias = $this->familiaRepository->all();

        return view('familias.index')
            ->with('familias', $familias);
    }

    /**
     * Show the form for creating a new Familia.
     *
     * @return Response
     */
    public function create()
    {
        return view('familias.create');
    }

    /**
     * Store a newly created Familia in storage.
     *
     * @param CreateFamiliaRequest $request
     *
     * @return Response
     */
    public function store(CreateFamiliaRequest $request)
    {
        $input = $request->all();

        $familia = $this->familiaRepository->create($input);

        Flash::success('Familia saved successfully.');

        return redirect(route('familias.index'));
    }

    /**
     * Display the specified Familia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        return view('familias.show')->with('familia', $familia);
    }

    /**
     * Show the form for editing the specified Familia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        return view('familias.edit')->with('familia', $familia);
    }

    /**
     * Update the specified Familia in storage.
     *
     * @param int $id
     * @param UpdateFamiliaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamiliaRequest $request)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        $familia = $this->familiaRepository->update($request->all(), $id);

        Flash::success('Familia updated successfully.');

        return redirect(route('familias.index'));
    }

    /**
     * Remove the specified Familia from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        $this->familiaRepository->delete($id);

        Flash::success('Familia deleted successfully.');

        return redirect(route('familias.index'));
    }
}
