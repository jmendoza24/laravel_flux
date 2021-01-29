<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdatos_personalesRequest;
use App\Http\Requests\Updatedatos_personalesRequest;
use App\Repositories\datos_personalesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class datos_personalesController extends AppBaseController
{
    /** @var  datos_personalesRepository */
    private $datosPersonalesRepository;

    public function __construct(datos_personalesRepository $datosPersonalesRepo)
    {
        $this->datosPersonalesRepository = $datosPersonalesRepo;
    }

    /**
     * Display a listing of the datos_personales.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $datosPersonales = $this->datosPersonalesRepository->all();

        return view('datos_personales.index')
            ->with('datosPersonales', $datosPersonales);
    }

    /**
     * Show the form for creating a new datos_personales.
     *
     * @return Response
     */
    public function create()
    {
        return view('datos_personales.create');
    }

    /**
     * Store a newly created datos_personales in storage.
     *
     * @param Createdatos_personalesRequest $request
     *
     * @return Response
     */
    public function store(Createdatos_personalesRequest $request)
    {
        $input = $request->all();

        $datosPersonales = $this->datosPersonalesRepository->create($input);

        Flash::success('Datos Personales saved successfully.');

        return redirect(route('datosPersonales.index'));
    }

    /**
     * Display the specified datos_personales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $datosPersonales = $this->datosPersonalesRepository->find($id);

        if (empty($datosPersonales)) {
            Flash::error('Datos Personales not found');

            return redirect(route('datosPersonales.index'));
        }

        return view('datos_personales.show')->with('datosPersonales', $datosPersonales);
    }

    /**
     * Show the form for editing the specified datos_personales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datosPersonales = $this->datosPersonalesRepository->find($id);

        if (empty($datosPersonales)) {
            Flash::error('Datos Personales not found');

            return redirect(route('datosPersonales.index'));
        }

        return view('datos_personales.edit')->with('datosPersonales', $datosPersonales);
    }

    /**
     * Update the specified datos_personales in storage.
     *
     * @param int $id
     * @param Updatedatos_personalesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedatos_personalesRequest $request)
    {
        $datosPersonales = $this->datosPersonalesRepository->find($id);

        if (empty($datosPersonales)) {
            Flash::error('Datos Personales not found');

            return redirect(route('datosPersonales.index'));
        }

        $datosPersonales = $this->datosPersonalesRepository->update($request->all(), $id);

        Flash::success('Datos Personales updated successfully.');

        return redirect(route('datosPersonales.index'));
    }

    /**
     * Remove the specified datos_personales from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $datosPersonales = $this->datosPersonalesRepository->find($id);

        if (empty($datosPersonales)) {
            Flash::error('Datos Personales not found');

            return redirect(route('datosPersonales.index'));
        }

        $this->datosPersonalesRepository->delete($id);

        Flash::success('Datos Personales deleted successfully.');

        return redirect(route('datosPersonales.index'));
    }
}
