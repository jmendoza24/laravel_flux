<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMaterialesRequest;
use App\Http\Requests\UpdateMaterialesRequest;
use App\Repositories\MaterialesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class MaterialesController extends AppBaseController
{
    /** @var  MaterialesRepository */
    private $materialesRepository;

    public function __construct(MaterialesRepository $materialesRepo)
    {
        $this->materialesRepository = $materialesRepo;
    }

    /**
     * Display a listing of the Materiales.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $materiales = $this->materialesRepository->all();

        return view('materiales.index')
            ->with('materiales', $materiales);
    }

    /**
     * Show the form for creating a new Materiales.
     *
     * @return Response
     */
    public function create(){
        $aceros = DB::table('tipoaceros')->orderby('acero')->get();
        $formas = DB::table('formas')->orderby('forma')->get();
        $grados = DB::table('grados')->orderby('grado')->get();
        $proveedores = DB::table('proveedores')->orderby('nombre')->get();

        return view('materiales.create',compact('aceros','formas','grados','proveedores'));
    }

    /**
     * Store a newly created Materiales in storage.
     *
     * @param CreateMaterialesRequest $request
     *
     * @return Response
     */
    public function store(CreateMaterialesRequest $request)
    {
        $input = $request->all();

        $materiales = $this->materialesRepository->create($input);

        Flash::success('Materiales saved successfully.');

        return redirect(route('materiales.index'));
    }

    /**
     * Display the specified Materiales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materiales = $this->materialesRepository->find($id);

        if (empty($materiales)) {
            Flash::error('Materiales not found');

            return redirect(route('materiales.index'));
        }

        return view('materiales.show')->with('materiales', $materiales);
    }

    /**
     * Show the form for editing the specified Materiales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $materiales = $this->materialesRepository->find($id);

        $aceros = DB::table('tipoaceros')->orderby('acero')->get();
        $formas = DB::table('formas')->orderby('forma')->get();
        $grados = DB::table('grados')->orderby('grado')->get();
        $proveedores = DB::table('proveedores')->orderby('nombre')->get();

        return view('materiales.edit',compact('materiales','aceros','formas','grados','proveedores'));
    }

    /**
     * Update the specified Materiales in storage.
     *
     * @param int $id
     * @param UpdateMaterialesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaterialesRequest $request)
    {
        $materiales = $this->materialesRepository->find($id);

        if (empty($materiales)) {
            Flash::error('Materiales not found');

            return redirect(route('materiales.index'));
        }

        $materiales = $this->materialesRepository->update($request->all(), $id);

        Flash::success('Materiales updated successfully.');

        return redirect(route('materiales.index'));
    }

    /**
     * Remove the specified Materiales from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materiales = $this->materialesRepository->find($id);

        if (empty($materiales)) {
            Flash::error('Materiales not found');

            return redirect(route('materiales.index'));
        }

        $this->materialesRepository->delete($id);

        Flash::success('Materiales deleted successfully.');

        return redirect(route('materiales.index'));
    }
}