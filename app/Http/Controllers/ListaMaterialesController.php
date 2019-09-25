<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateListaMaterialesRequest;
use App\Http\Requests\UpdateListaMaterialesRequest;
use App\Repositories\ListaMaterialesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class ListaMaterialesController extends AppBaseController
{
    /** @var  ListaMaterialesRepository */
    private $listaMaterialesRepository;

    public function __construct(ListaMaterialesRepository $listaMaterialesRepo)
    { 
        $this->listaMaterialesRepository = $listaMaterialesRepo;
    }

    /**
     * Display a listing of the ListaMateriales.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $listaMateriales = $this->listaMaterialesRepository->all();

        return view('lista_materiales.index')
            ->with('listaMateriales', $listaMateriales);
    }

    /**
     * Show the form for creating a new ListaMateriales.
     *
     * @return Response
     */
    public function create(){
        $aceros = DB::table('tipoaceros')->orderby('acero')->get();
        $formas = DB::table('formas')->orderby('forma')->get();
        $grados = DB::table('grados')->orderby('grado')->get();
        $proveedores = DB::table('proveedores')->orderby('nombre')->get();

        return view('lista_materiales.create',compact('aceros','formas','grados','proveedores'));
    }

    /**
     * Store a newly created ListaMateriales in storage.
     *
     * @param CreateListaMaterialesRequest $request
     *
     * @return Response
     */
    public function store(CreateListaMaterialesRequest $request)
    {
        $input = $request->all();

        $listaMateriales = $this->listaMaterialesRepository->create($input);

        Flash::success('Lista Materiales saved successfully.');

        return redirect(route('listaMateriales.index'));
    }

    /**
     * Display the specified ListaMateriales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $listaMateriales = $this->listaMaterialesRepository->find($id);

        if (empty($listaMateriales)) {
            Flash::error('Lista Materiales not found');

            return redirect(route('listaMateriales.index'));
        }

        return view('lista_materiales.show')->with('listaMateriales', $listaMateriales);
    }

    /**
     * Show the form for editing the specified ListaMateriales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $listaMateriales = $this->listaMaterialesRepository->find($id);

        $materiales = $this->materialesRepository->find($id);

        $aceros = DB::table('tipoaceros')->orderby('acero')->get();
        $formas = DB::table('formas')->orderby('forma')->get();
        $grados = DB::table('grados')->orderby('grado')->get();
        $proveedores = DB::table('proveedores')->orderby('nombre')->get();

        return view('lista_materiales.edit',compact('materiales','aceros','formas','grados','proveedores'));
        #return view('lista_materiales.edit')->with('listaMateriales', $listaMateriales);
    }

    /**
     * Update the specified ListaMateriales in storage.
     *
     * @param int $id
     * @param UpdateListaMaterialesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateListaMaterialesRequest $request)
    {
        $listaMateriales = $this->listaMaterialesRepository->find($id);

        if (empty($listaMateriales)) {
            Flash::error('Lista Materiales not found');

            return redirect(route('listaMateriales.index'));
        }

        $listaMateriales = $this->listaMaterialesRepository->update($request->all(), $id);

        Flash::success('Lista Materiales updated successfully.');

        return redirect(route('listaMateriales.index'));
    }

    /**
     * Remove the specified ListaMateriales from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $listaMateriales = $this->listaMaterialesRepository->find($id);

        if (empty($listaMateriales)) {
            Flash::error('Lista Materiales not found');

            return redirect(route('listaMateriales.index'));
        }

        $this->listaMaterialesRepository->delete($id);

        Flash::success('Lista Materiales deleted successfully.');

        return redirect(route('listaMateriales.index'));
    }
}
