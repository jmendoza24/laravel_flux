<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatelogisticaRequest;
use App\Http\Requests\UpdatelogisticaRequest;
use App\Repositories\logisticaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use View;
use Flash;
use Response;
use DB;

class logisticaController extends AppBaseController
{
    /** @var  logisticaRepository */
    private $logisticaRepository;

    public function __construct(logisticaRepository $logisticaRepo)
    {
        $this->logisticaRepository = $logisticaRepo;
    }

    /**
     * Display a listing of the logistica.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $logisticas = DB::table('logisticas as a')
                    ->leftjoin('estados as e','e.id','=','a.estado')
                    ->leftjoin('paises as p','p.id','=','a.pais')
                    ->selectraw("a.*, p.nombre as npais, e.estado as nestado, a.municipio as nmunicipio")
                    ->get();

        return view('logisticas.index')
            ->with('logisticas', $logisticas);
    }

    /**
     * Show the form for creating a new logistica.
     *
     * @return Response
     */
    public function create(){
        $estados = DB::table('tbl_estados')->orderby('estado')->get();
        
        $logisticas = array();
        //$data = (object)['logisticas'=>''];
        $municipios = array();
        //$data = (object)['municipios'=>''];
        return view('logisticas.create',compact('estados','municipios'));
    }

    /**
     * Store a newly created logistica in storage.
     *
     * @param CreatelogisticaRequest $request
     *
     * @return Response
     */
    public function store(CreatelogisticaRequest $request)
    {
        $input = $request->all();

        $logistica = $this->logisticaRepository->create($input);

        Flash::success('Logistica saved successfully.');

        return redirect(route('logisticas.index'));
    }

    /**
     * Display the specified logistica.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logistica = $this->logisticaRepository->find($id);

        if (empty($logistica)) {
            Flash::error('Logistica not found');

            return redirect(route('logisticas.index'));
        }

        return view('logisticas.show')->with('logistica', $logistica);
    }

    /**
     * Show the form for editing the specified logistica.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Request $request){

        
        $logisticas = DB::table('logisticas')
                    ->where('id',$request->id_logistica)
                    ->get();

        $logisticas_fields = $logisticas[0];
        $id_pais = $logisticas_fields->pais;
        $estados = db::table('estados')
                    ->where('id_pais',$id_pais)
                    ->orderby('estado')
                    ->get();
        $paises = DB::table('paises')->orderby('nombre')->get();    

        $options = view("logisticas.fields",compact('logisticas_fields','estados','paises'))->render();    
        return json_encode($options);

    }

    /**
     * Update the specified logistica in storage.
     *
     * @param int $id
     * @param UpdatelogisticaRequest $request
     *
     * @return Response
     */
    public function update(Request $request){
        DB::table('logisticas')
        ->where('id', $request->id_direccion)
        ->update([ 'nombre'      => $request->nombre_log, 
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
                    ->where('id_producto',$request->id_producto)
                    ->get();

         $options = view("logisticas.table",compact('logisticas'))->render();    
         return json_encode($options);
        
    }

    /**
     * Remove the specified logistica from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function eliminar(Request $request){
      
        DB::table('logisticas')->where('id',$request->id_logistica)->delete();

        $logisticas = DB::table('logisticas as a')
                    ->leftjoin('estados as e','e.id','=','a.estado')
                    ->leftjoin('paises as p','p.id','=','a.pais')
                    ->selectraw("a.*, p.nombre as npais, e.estado as nestado, a.municipio as nmunicipio")
                    ->get();                   

         $options = view("logisticas.table",compact('logisticas'))->render();    
         return json_encode($options);
    }
}
