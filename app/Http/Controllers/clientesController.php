<?php

namespace App\Http\Controllers;

use App\Models\logistica;
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
                      ->leftjoin('estados as e','e.id','=','c.estado')
                      //->leftjoin('tbl_municipios as m','m.id','=','c.municipio')
                      ->leftjoin('proveedores as p','p.id','=','c.id_proveedor')
                      ->leftjoin('paises as pa','pa.id','=','c.pais')
                      ->selectraw("c.*,e.estado as nestado, pa.nombre as npais, c.municipio as nmunicipio, p.nombre as nproveedor")
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
        $estados = array();
        $paises = DB::table('paises')->orderby('nombre')->get();
        
        $logisticas = array();
        $proveedores = DB::table('proveedores')->get();

        return view('clientes.create',compact('estados','logisticas','paises','proveedores'));
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
        $id_pais = $clientes->pais;
        $estados = db::table('estados')
                    ->where('id_pais',$id_pais)
                    ->orderby('estado')
                    ->get();
        $paises = DB::table('paises')->orderby('nombre')->get();
        if (empty($clientes)) {
            Flash::error('Clientes not found');

            return redirect(route('clientes.index'));
        }

         $proveedores = DB::table('proveedores')->get();
         
         $logisticas_fields = array('id'=>'',
                                    'nombre'=>'',
                                    'telefono'=>'',
                                    'correo'=>'',
                                    'calle'=>'', 
                                    'cp'=>'',
                                    'numero'=>'',
                                    'estado'=>'',
                                    'pais'=>'',
                                    'municipio'=>'',
                                    'id_producto'=>''
                                );

         $logisticas_fields = (object)$logisticas_fields;

         $logisticas = DB::table('logisticas as a')
                    ->leftjoin('estados as e','e.id','=','a.estado')
                    ->leftjoin('paises as p','p.id','=','a.pais')
                    ->where('a.id_producto',$id)
                    ->selectraw("a.*, p.nombre as npais, e.estado as nestado, a.municipio as nmunicipio")
                    ->get();
        

        return view('clientes.edit', compact('clientes','paises','estados','logisticas','proveedores','logisticas_fields'));
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

        #dd($request->all());
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
    public function destroy($id){
        DB::table('clientes')->where('id',$id)->delete();

        return redirect(route('clientes.index'));
    }
    
    function save_address(Request $request){
        $filtro = new logistica;
        $filtro->id_cliente = $request->id_producto;

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

        $logisticas = $filtro->cliente_logisticas($filtro);

        $options = view("logisticas.table",compact('logisticas'))->render();    
        return json_encode($options);
    }

}

