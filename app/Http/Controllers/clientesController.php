<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateclientesRequest;
use App\Http\Requests\UpdateclientesRequest;
use App\Repositories\clientesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use View;
use Flash;
use Response;
use DB;

class clientesController extends AppBaseController
{
    /** @var  clientesRepository */
    private $clientesRepository;

    public function __construct(clientesRepository $clientesRepo)
    {
        $this->clientesRepository = $clientesRepo;
    }

    /**
     * Display a listing of the clientes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){ 
        $clientes = DB::table('clientes as c')
                      ->leftjoin('tbl_estados as e','e.id','=','c.estado')
                      ->leftjoin('tbl_municipios as m','m.id','=','c.municipio')
                      ->leftjoin('proveedores as p','p.id','=','c.id_proveedor')
                      ->selectraw("c.*,e.estado as nestado, if(c.pais=1,'México','') as npais, m.municipio as nmunicipio, p.nombre as nproveedor")
                      ->get();

        return view('clientes.index')
            ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new clientes.
     *
     * @return Response
     */
    public function create(){
        $estados = DB::table('tbl_estados')->orderby('estado')->get();
        
        $logisticas = array();
        //$data = (object)['logisticas'=>''];
        $municipios = array();
        //$data = (object)['municipios'=>''];
        $proveedores = DB::table('proveedores')->get();

        return view('clientes.create',compact('estados','logisticas','municipios','proveedores'));
    }

    /**
     * Store a newly created clientes in storage.
     *
     * @param CreateclientesRequest $request
     *
     * @return Response
     */
    public function store(CreateclientesRequest $request)
    {
        $input = $request->all();

        $clientes = $this->clientesRepository->create($input);

        Flash::success('Clientes saved successfully.');

        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified clientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            Flash::error('Clientes not found');

            return redirect(route('clientes.index'));
        }

        return view('clientes.show')->with('clientes', $clientes);
    }

    /**
     * Show the form for editing the specified clientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientes = $this->clientesRepository->find($id);
        $id_estado = $clientes->estado;
        if (empty($clientes)) {
            Flash::error('Clientes not found');

            return redirect(route('clientes.index'));
        }

         $proveedores = DB::table('proveedores')->get();
         $estados = DB::table('tbl_estados')->orderby('estado')->get();
         $logisticas_fields = array('nombre'=>'',
                                    'telefono'=>'',
                                    'correo'=>'',
                                    'calle'=>'',
                                    'cp'=>'',
                                    'numero'=>'',
                                    'estado'=>'',
                                    'pais'=>'',
                                    'municipio'=>''
                                );

         $logisticas_fields = (object)$logisticas_fields;

         $logisticas = DB::table('logisticas as a')
                    ->leftjoin('tbl_estados as e','e.id','=','a.estado')
                    ->leftjoin('tbl_municipios as m','m.id','=','a.municipio')
                    ->selectraw("a.*, if(pais=1,'México','') as npais, e.estado as nestado, m.municipio as nmunicipio")
                    ->where('id_producto',$id)
                    ->get();
        

         $municipios = DB::table('tbl_estadosmun as em')
                          ->join('tbl_municipios as m','em.municipios_id','=','m.id') 
                          ->selectraw('m.*')
                          ->where('em.estados_id',$id_estado)
                          ->get(); 

        return view('clientes.edit', compact('clientes','estados','logisticas','municipios','proveedores','logisticas_fields'));
    }

    /**
     * Update the specified clientes in storage.
     *
     * @param int $id
     * @param UpdateclientesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclientesRequest $request)
    {
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            Flash::error('Clientes not found');

            return redirect(route('clientes.index'));
        }

        $clientes = $this->clientesRepository->update($request->all(), $id);

        Flash::success('Clientes updated successfully.');

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified clientes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            Flash::error('Clientes not found');

            return redirect(route('clientes.index'));
        }

        $this->clientesRepository->delete($id);

        Flash::success('Clientes deleted successfully.');

        return redirect(route('clientes.index'));
    }
    function save_address(Request $request){
        DB::table('logisticas')
         ->insert(['id_producto' => $request->id_producto, 
                   'nombre'      => $request->nombre_log, 
                   'telefono'    => $request->telefono_log, 
                   'correo'      => $request->correo_log, 
                   'pais'        => $request->pais_log, 
                   'estado'      => $request->estado_log, 
                   'municipio'   => $request->municipio_log, 
                   'calle'       => $request->calle_log, 
                   'numero'      => $request->numero_log, 
                   'cp'          => $request->cp_log
                ]);    

         $logisticas = DB::table('logisticas as a')
                    ->leftjoin('tbl_estados as e','e.id','=','a.estado')
                    ->leftjoin('tbl_municipios as m','m.id','=','a.municipio')
                    ->selectraw("a.*, if(pais=1,'México','') as npais, e.estado as nestado, m.municipio as nmunicipio")
                    ->get();

         $options = view("logisticas.table",compact('logisticas'))->render();    
         return json_encode($options);
    }
}

