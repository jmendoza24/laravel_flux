<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecotizacionesRequest;
use App\Http\Requests\UpdatecotizacionesRequest;
use App\Repositories\cotizacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class cotizacionesController extends AppBaseController
{
    /** @var  cotizacionesRepository */
    private $cotizacionesRepository;

    public function __construct(cotizacionesRepository $cotizacionesRepo)
    {
        $this->cotizacionesRepository = $cotizacionesRepo;
    }

    /**
     * Display a listing of the cotizaciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cotizaciones = $this->cotizacionesRepository->all();
        $clientes = DB::table('clientes')->get();
        $dibujos = DB::table('producto_dibujos')->get();

        return view('cotizaciones.index',compact('cotizaciones','clientes','dibujos'));
    }

    /**
     * Show the form for creating a new cotizaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotizaciones.create');
    }

    /**
     * Store a newly created cotizaciones in storage.
     *
     * @param CreatecotizacionesRequest $request
     *
     * @return Response
     */
    public function store(CreatecotizacionesRequest $request)
    {
        $input = $request->all();

        $cotizaciones = $this->cotizacionesRepository->create($input);

        Flash::success('Cotizaciones saved successfully.');

        return redirect(route('cotizaciones.index'));
    }

    /**
     * Display the specified cotizaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotizaciones = $this->cotizacionesRepository->find($id);

        if (empty($cotizaciones)) {
            Flash::error('Cotizaciones not found');

            return redirect(route('cotizaciones.index'));
        }

        return view('cotizaciones.show')->with('cotizaciones', $cotizaciones);
    }

    /**
     * Show the form for editing the specified cotizaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotizaciones = $this->cotizacionesRepository->find($id);

        if (empty($cotizaciones)) {
            Flash::error('Cotizaciones not found');

            return redirect(route('cotizaciones.index'));
        }

        return view('cotizaciones.edit')->with('cotizaciones', $cotizaciones);
    }

    /**
     * Update the specified cotizaciones in storage.
     *
     * @param int $id
     * @param UpdatecotizacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecotizacionesRequest $request)
    {
        $cotizaciones = $this->cotizacionesRepository->find($id);

        if (empty($cotizaciones)) {
            Flash::error('Cotizaciones not found');

            return redirect(route('cotizaciones.index'));
        }

        $cotizaciones = $this->cotizacionesRepository->update($request->all(), $id);

        Flash::success('Cotizaciones updated successfully.');

        return redirect(route('cotizaciones.index'));
    }

    /**
     * Remove the specified cotizaciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cotizaciones = $this->cotizacionesRepository->find($id);

        if (empty($cotizaciones)) {
            Flash::error('Cotizaciones not found');

            return redirect(route('cotizaciones.index'));
        }

        $this->cotizacionesRepository->delete($id);

        Flash::success('Cotizaciones deleted successfully.');

        return redirect(route('cotizaciones.index'));
    }
}
