<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproveedoresRequest;
use App\Http\Requests\UpdateproveedoresRequest;
use App\Repositories\proveedoresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class proveedoresController extends AppBaseController
{
    /** @var  proveedoresRepository */
    private $proveedoresRepository;

    public function __construct(proveedoresRepository $proveedoresRepo)
    {
        $this->proveedoresRepository = $proveedoresRepo;
    }

    /**
     * Display a listing of the proveedores.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proveedores = DB::table('proveedores as p')
                      ->leftjoin('estados as e','e.id','=','p.estado')
                      ->leftjoin('paises as pa','pa.id','=','p.pais')
                      ->selectraw("p.*,e.estado as nestado, pa.nombre as npais, p.municipio as nmunicipio")
                      ->get();

        return view('proveedores.index')
            ->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new proveedores.
     *
     * @return Response
     */
    public function create(){
        $paises = DB::table('paises')->orderby('nombre')->get();
        $estados = array('');

        return view('proveedores.create',compact('estados','paises'));
    }

    /**
     * Store a newly created proveedores in storage.
     *
     * @param CreateproveedoresRequest $request
     *
     * @return Response
     */
    public function store(CreateproveedoresRequest $request)
    {
        $input = $request->all();

        $proveedores = $this->proveedoresRepository->create($input);

        Flash::success('Proveedores saved successfully.');

        return redirect(route('proveedores.index'));
    }

    /**
     * Display the specified proveedores.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proveedores = $this->proveedoresRepository->find($id);

        if (empty($proveedores)) {
            Flash::error('Proveedores not found');

            return redirect(route('proveedores.index'));
        }

        return view('proveedores.show')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for editing the specified proveedores.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $proveedores = $this->proveedoresRepository->find($id);

        $id_pais = $proveedores->pais;
        $paises = DB::table('paises')->orderby('nombre')->get();
        $estados = db::table('estados')
                    ->where('id_pais',$id_pais)
                    ->orderby('estado')
                    ->get();

        return view('proveedores.edit',compact('proveedores','estados', 'paises'));
    }

    /**
     * Update the specified proveedores in storage.
     *
     * @param int $id
     * @param UpdateproveedoresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproveedoresRequest $request)
    {
        $proveedores = $this->proveedoresRepository->find($id);

        if (empty($proveedores)) {
            Flash::error('Proveedores not found');

            return redirect(route('proveedores.index'));
        }

        $proveedores = $this->proveedoresRepository->update($request->all(), $id);

        Flash::success('Proveedores updated successfully.');

        return redirect(route('proveedores.index'));
    }

    /**
     * Remove the specified proveedores from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
       DB::table('proveedores')->where('id',$id)->delete();

        return redirect(route('proveedores.index'));
    }
}
