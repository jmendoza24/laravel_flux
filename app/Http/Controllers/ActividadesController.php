<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActividadesRequest;
use App\Http\Requests\UpdateActividadesRequest;
use App\Repositories\ActividadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ActividadesController extends AppBaseController
{
    /** @var  ActividadesRepository */
    private $actividadesRepository;

    public function __construct(ActividadesRepository $actividadesRepo)
    {
        $this->actividadesRepository = $actividadesRepo;
    }

    /**
     * Display a listing of the Actividades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $actividades = $this->actividadesRepository->all();

        return view('actividades.index')
            ->with('actividades', $actividades);
    }

    /**
     * Show the form for creating a new Actividades.
     *
     * @return Response
     */
    public function create()
    {
        return view('actividades.create');
    }

    /**
     * Store a newly created Actividades in storage.
     *
     * @param CreateActividadesRequest $request
     *
     * @return Response
     */
    public function store(CreateActividadesRequest $request)
    {
        $input = $request->all();

        $actividades = $this->actividadesRepository->create($input);

        Flash::success('Actividades saved successfully.');

        return redirect(route('actividades.index'));
    }

    /**
     * Display the specified Actividades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actividades = $this->actividadesRepository->find($id);

        if (empty($actividades)) {
            Flash::error('Actividades not found');

            return redirect(route('actividades.index'));
        }

        return view('actividades.show')->with('actividades', $actividades);
    }

    /**
     * Show the form for editing the specified Actividades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actividades = $this->actividadesRepository->find($id);

        if (empty($actividades)) {
            Flash::error('Actividades not found');

            return redirect(route('actividades.index'));
        }

        return view('actividades.edit')->with('actividades', $actividades);
    }

    /**
     * Update the specified Actividades in storage.
     *
     * @param int $id
     * @param UpdateActividadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActividadesRequest $request)
    {
        $actividades = $this->actividadesRepository->find($id);

        if (empty($actividades)) {
            Flash::error('Actividades not found');

            return redirect(route('actividades.index'));
        }

        $actividades = $this->actividadesRepository->update($request->all(), $id);

        Flash::success('Actividades updated successfully.');

        return redirect(route('actividades.index'));
    }

    /**
     * Remove the specified Actividades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $actividades = $this->actividadesRepository->find($id);

        if (empty($actividades)) {
            Flash::error('Actividades not found');

            return redirect(route('actividades.index'));
        }

        $this->actividadesRepository->delete($id);

        Flash::success('Actividades deleted successfully.');

        return redirect(route('actividades.index'));
    }
}
