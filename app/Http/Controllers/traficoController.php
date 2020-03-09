<?php

namespace App\Http\Controllers;

use App\Models\trafico;
use App\Models\clientes;
use App\Models\Trafico_documentos;
use App\Models\Trafico_tarimas;
use App\Models\Trafico_flete;
use App\Models\planta;
use App\Models\tarimas_idns;
use App\Models\logistica;
use App\Models\invoices;
use App\Models\flete_fracciones;
use App\Http\Requests\CreatetraficoRequest;
use App\Http\Requests\UpdatetraficoRequest;
use App\Repositories\traficoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use DB;
use Auth;
use Session;
use PDF;

class traficoController extends AppBaseController
{
    /** @var  traficoRepository */
    private $traficoRepository;

    public function __construct(traficoRepository $traficoRepo)
    {
        $this->traficoRepository = $traficoRepo;
    }

    /**
     * Display a listing of the trafico.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
#       $trafic = new trafico;

        if($request->session()->has('no_track')) {
            $trafico_numero = $request->session()->get('no_track');

         }else{
            $fecha = date('Y-m-d');
            $id = trafico::insertGetId(['id_usuario'=>auth()->id(),
                                        'estatus'=>0]);
            $request->session()->put('no_track',$id);
            $trafico_numero = $request->session()->get('no_track');
         }

         $traficos_det = db::select('select dt.id_trafico,o.cliente as idcliente,pr.*, if(dt.id_detalle is null, 0,1) as existe, o.shipping, c.nombre_corto, sp.fecha_estimado_termino, a.nombre as planta_name, l.calle,   p.nombre as npais, e.estado as nestado, l.municipio as nmunicipio, pr.id as idproducto, o.orden_compra, d.id as id_detalle, pr.numero_parte, d.incremento, d.fecha_entrega
                                    from ordencompra_detalle as  d
                                    inner join  ordenes_compras as o on o.id = d.id_orden
                                    left join traficos_detalle as dt on dt.id_detalle = d.id 
                                    left join clientes as c on c.id = o.cliente
                                    left join productos as pr on pr.id = d.producto
                                    left join seguimiento_planeacion as sp on sp.id_detalle = d.id
                                    left join logisticas as l on l.id = o.shipping
                                    left join plantas as a on a.id = d.planta
                                    left join estados as e on e.id = l.estado
                                    left join paises as p on p.id = l.pais
                                    where o.tipo in (2,3)
                                    order by d.id asc');

        $trafic = new trafico;       
        $trafico = $trafic->get_trafico();

        $traficos = $trafic->filtro_trafico(0,$trafico_numero);
        $cliente_actual  = $trafic->cliente_actual($trafico_numero); 
        if(sizeof($cliente_actual)>0){
            $cliente_actual = $cliente_actual[0];    
        }else{
            $cliente_actual = array('cliente'=>0,
                                    'nombre_corto'=>'');
            $cliente_actual = (object)$cliente_actual;
        }
        
        
        $cliente = clientes::get();

        return view('traficos.index',compact('trafico','traficos','cliente_actual','cliente', 'traficos_det','trafico_numero'));
    }

    function agrega_trafico(Request $request){
        $trafic = new trafico;
        $trafico_numero = $request->session()->get('no_track');
        $cliente_actual  = $trafic->cliente_actual($trafico_numero); 
        if(sizeof($cliente_actual)>0){
            $cliente_actual = $cliente_actual[0];    
        }else{
            $cliente_actual = array('cliente'=>$request->id_cliente,
                                    'nombre_corto'=>'');
            $cliente_actual = (object)$cliente_actual;
        }

        if($cliente_actual->cliente != $request->id_cliente){
            db::table('traficos_detalle')->where('id_trafico',$trafico_numero)->delete();
        }

        $existe = db::table('traficos_detalle')
                ->where([['id_trafico',$trafico_numero],['id_detalle',$request->id_detalle]])
                ->count();

        if($existe > 0 and $request->valor==0){
            db::table('traficos_detalle')
                ->where([['id_trafico',$trafico_numero],['id_detalle',$request->id_detalle]])
                ->delete();
        }elseif($request->valor==1 and $existe==0){
             db::table('traficos_detalle')
             ->insert(['id_trafico'=>$trafico_numero,
                       'id_detalle'=>$request->id_detalle]);
        }
        
        $var = db::table('traficos_detalle')->where('id_trafico',$trafico_numero)->get();
        $cliente_actual  = $trafic->cliente_actual($trafico_numero); 
        #dd($var);
        if(sizeof($cliente_actual)>0){
            $cliente_actual = $cliente_actual[0];    
        }else{
            $cliente_actual = array('cliente'=>0,
                                    'nombre_corto'=>'');
            $cliente_actual = (object)$cliente_actual;
        }
        $traficos = $trafic->filtro_trafico($request->id_cliente,$trafico_numero);
        $options = view('traficos.table',compact('traficos'))->render();

        $arr  = array('cliente_actual'=>$cliente_actual,
                      'options'=>$options);

        return json_encode($arr);
    }
    /**
     * Show the form for creating a new trafico.
     *
     * @return Response
     */
    public function create(Request $request){
        $trafic = new trafico;

        if($request->session()->has('no_track')) {
            $trafico_numero = $request->session()->get('no_track');

         }else{
            $fecha = date('Y-m-d');
            $id = trafico::insertGetId(['id_usuario'=>auth()->id(),
                                        'estatus'=>0]);
            $request->session()->put('no_track',$id);
            $trafico_numero = $request->session()->get('no_track');
         }

        $traficos = $trafic->filtro_trafico(0,$trafico_numero);
        $cliente_actual  = $trafic->cliente_actual($trafico_numero); 
        if(sizeof($cliente_actual)>0){
            $cliente_actual = $cliente_actual[0];    
        }else{
            $cliente_actual = array('cliente'=>0,
                                    'nombre_corto'=>'');
            $cliente_actual = (object)$cliente_actual;
        }
        
        
        $cliente = clientes::get();
        #db::table('traficos_detalle')->where('id_trafico',$trafico_numero)->delete();
        return view('traficos.create',compact('traficos','trafico_numero','cliente','cliente_actual'));
    }

    function muestra_trafico(Request $request){
        $trafic = new trafico;
        $trafico_numero = $request->session()->get('no_track');

        $traficos = $trafic->filtro_trafico($request->id_cliente,$trafico_numero);

        #dd($traficos);
        if(sizeof($traficos)>0){
            $options = view('traficos.table',compact('traficos'))->render();
            
        }else{
            $options = '<br/><br/><h4>No existen idns para este cliente</h4>';
        }
        return json_encode($options);

    }
 
    function seguimiento_trafico(Request $request){
        $logistica = new logistica;
        $trafic = new trafico;
        
        $trafico = $request->ide;
        $files = db::table('traficos_documentos')->where('id_trafico',$request->ide)->get();
        $tarimas = db::table('traficos_tarimas as t')
                    ->join('logisticas as a', 'a.id','t.shipping_id')
                    ->leftjoin('estados as e','e.id','=','a.estado')
                    ->leftjoin('paises as p','p.id','=','a.pais')
                    ->where('id_trafico',$trafico)
                    ->selectraw("t.*, a.calle, a.numero, a.cp, p.nombre as npais, e.estado as nestado, a.municipio as nmunicipio")
                    ->get();

        $tarimas_pod = $logistica->logisticas_tarima($trafico);

        $plantas = planta::get();
        $info_trafico = trafico::where('id',$trafico)->get();
        $info_trafico = $info_trafico[0];

        $fletes = Trafico_flete::where('id_trafico',$trafico)->get();
        if(sizeof($fletes)>0){
            $fletes = $fletes[0];
        }else{
            $fletes = array('id_trafico'        => '',
                            'agencia_mx'        => '',
                            'no_plataforma'     => '',
                            'placas'            => '',
                            'pais_orige'        => '',
                            'largo'             => '',
                            'scac'              => '',
                            'caat'              => '',
                            'no_referencia'     => '',
                            'entrada_camion'    => '',
                            'salida_camion'     => '',
                            'arancelaria_usa'   => '',
                            'fecha_entrega'     => '',
                            'tipo_cambio'       => '',
                            'arancelaria_mx'    => '',
                            'liberacion_ad_mx'  =>'',
                            'liberacion_ad_usa' =>'',
                            'entrega_bodega'    =>'');
            $fletes = (object)$fletes;
        }
        $tarimas_idns = tarimas_idns::where('id_trafico',$trafico)->get();
        $traficos_detalle = db::table('traficos_detalle as td')
                                ->where('id_trafico',$trafico)
                                ->orderby('id_detalle')
                                ->get();

        $flete_fracciones = db::table('traficos_detalle as d')
                                ->join('ordencompra_detalle as od','od.id','d.id_detalle')
                                ->join('productos as p','p.id','od.producto')
                                ->leftjoin('flete_fracciones as ff', 'ff.id_detalle','d.id_detalle')
                                ->where('d.id_trafico',$trafico)
                                ->orderby('d.id_detalle')
                                ->selectraw('p.numero_parte, d.id_detalle, ff.fraccion_mx, ff.fraccion_us')
                                ->get();
        $estatus_i = db::select('select t.id_trafico, count(*) as conteo
                                       from traficos_detalle t
                                       left join seguimiento_calidad s on s.id_detalle = t.id_detalle and s.estatus = 2
                                       where id_trafico = '.$trafico.' 
                                       group by t.id_trafico');

        $options = view('traficos.show_fields',compact('trafico','files','tarimas','fletes','plantas','info_trafico','tarimas_idns','traficos_detalle','flete_fracciones','tarimas_pod','estatus_i'))->render();

        return json_encode($options);
    }

    function finaliza_trafico(Request $request){
        $trafico_numero = $request->session()->get('no_track');
       
        $informacion = db::select('select td.id_trafico,orden_compra, count(*) as cant, d.id_orden, sum(costo_produccion) as costo_produccion
                                   from  ordenes_compras as o 
                                   inner join ordencompra_detalle as d on o.id = d.id_orden
                                   inner join traficos_detalle as td on td.id_detalle = d.id
                                   left join productos p on p.id = d.producto
                                   where td.id_trafico = '.$trafico_numero .' 
                                   group by td.id_trafico, orden_compra, d.id_orden');
    #dd($informacion);
        #invoices::truncate();
        foreach ($informacion as $info) {
            invoices::insert(['id_trafico'=>$info->id_trafico,
                              'id_orden'=>$info->id_orden,
                              'orden_compra'=>$info->orden_compra,
                              'fecha_entrega'=>date('Y-m-d'),
                              'fecha_pago'=>date('Y-m-d'),
                              'monto'=>$info->costo_produccion,
                              'monto_pagado'=>0,
                              'created_at'=>date('Y-m-d')]);
        }

        #$trafico_numero = $request->session()->get('no_track');
        $request->session()->forget('no_track');
        return 1;

    }
    function carga_files_trafico(Request $request){
        #Trafico_documentos::truncate();
        $path =  Storage::putFileAs('trafico', $request->file('documento_carga'), $request->file('documento_carga')->getClientOriginalName());
        $existe = Trafico_documentos::where([['id_trafico',$request->id_trafico],['documento',$request->tipo_documento]])->count();
        if($existe > 0){
            Trafico_documentos::where([['id_trafico',$request->id_trafico],['documento',$request->tipo_documento]])
                                ->update(['file'=>$path]);    
        }else{
            Trafico_documentos::insert(['id_trafico'=>$request->id_trafico,
                                        'documento'=>$request->tipo_documento,
                                        'file'=>'storage/'.$path]);    
        }
        
        $files = db::table('traficos_documentos')->where('id_trafico',$request->id_trafico)->get();
        $trafico = $request->id_trafico;

        $options = view('traficos.show_fields',compact('trafico','files'))->render();
        return $options;
    }

    function guarda_trafico_tarima(Request $request){
        $logistica = new logistica;
        $trafic = new trafico;

        $idns = $request->idns;
        #dd($idns);

        if($request->id_tarima == 0){
            $last_id = Trafico_tarimas::insertGetId(['id_trafico'=>$request->trafico,
                                                  'peso'=>$request->peso,
                                                  'altura'=>$request->altura,
                                                  'ancho'=>$request->ancho,
                                                  'largo'=>$request->largo,
                                                  'pero_tarima'=>$request->pero_tarima,
                                                  'shipping_id'=>$request->shipping_id]);

        foreach($idns as $idn) {
                tarimas_idns::insert(['id_trafico'=>$request->trafico,
                                      'id_tarima'=>$last_id,
                                      'idn'=>$idn]);
            }    
    
        }else{
            Trafico_tarimas::where('id',$request->id_tarima)
                            ->update(['peso'=>$request->peso,
                                      'altura'=>$request->altura,
                                      'ancho'=>$request->ancho,
                                      'largo'=>$request->largo,
                                      'pero_tarima'=>$request->pero_tarima,
                                      'shipping_id'=>$request->shipping_id]);
            
            tarimas_idns::where('id_tarima',$request->id_tarima)->delete();

            foreach($idns as $idn) {
                tarimas_idns::insert(['id_trafico'=>$request->trafico,
                                      'id_tarima'=>$request->id_tarima,
                                      'idn'=>$idn]);
            }

        }
        

        $tarimas_idns = tarimas_idns::where('id_trafico',$request->trafio)->get();
        


        $cliente_actual  = $trafic->cliente_actual($request->trafico); 
        $cliente_actual = $cliente_actual[0];

        $logistica->id_cliente = $cliente_actual->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);
        $traficos_detalle = db::table('traficos_detalle as td')
                                ->join('ordencompra_detalle as od','td.id_detalle','od.id')
                                ->join('ordenes_compras as o','o.id','od.id_orden')
                                ->where([['id_trafico',$request->trafico],['shipping',$request->shipping_id]])
                                ->selectraw('td.*, o.shipping')
                                ->orderby('id_detalle')
                                ->get();

        $tarimas = db::table('traficos_tarimas as t')
                    ->join('logisticas as a', 'a.id','t.shipping_id')
                    ->leftjoin('estados as e','e.id','=','a.estado')
                    ->leftjoin('paises as p','p.id','=','a.pais')
                    ->where('id_trafico',$request->trafico)
                    ->selectraw("t.*, a.calle, a.numero, a.cp, p.nombre as npais, e.estado as nestado, a.municipio as nmunicipio")
                    ->get();

        $options = view('traficos.tarimas',compact('tarimas','tarimas_idns','traficos_detalle','logisticas'))->render();
        return $options;
    }

    function actualiza_tarimas(Request $request){
        $logistica = new logistica;
        $trafic = new trafico;

        if($request->campo=='idns'){
            $idns = $request->valor;
            tarimas_idns::where([['id_tarima',$request->id],['id_trafico',$request->id_trafico]])->delete();
            foreach($idns as $idn) {
            tarimas_idns::insert(['id_trafico'=>$request->id_trafico,
                                  'id_tarima'=>$request->id,
                                  'idn'=>$idn]);
            }

        }else{
            Trafico_tarimas::where('id',$request->id)
                        ->update([$request->campo=>$request->valor]);    
        }
        $traficos_detalle = db::table('traficos_detalle')->where('id_trafico',$request->id_trafico)->orderby('id_detalle')->get();
        $tarimas_idns = tarimas_idns::where('id_trafico',$request->id_trafico)->get();
        $tarimas = Trafico_tarimas::where('id_trafico',$request->id_trafico)->orderBy('id', 'DESC')->get();
        $cliente_actual  = $trafic->cliente_actual($request->id_trafico); 
        $cliente_actual = $cliente_actual[0];

        $logistica->id_cliente = $cliente_actual->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);

        $options = view('traficos.tarimas',compact('tarimas','traficos_detalle','tarimas_idns','logisticas'))->render();
        return $options;
    }
    
    function elimina_tarifa(Request $request){
        $logistica = new logistica;
        $trafic = new trafico;

        Trafico_tarimas::where('id',$request->id)->delete();

        $tarimas_idns = tarimas_idns::where('id_trafico',$request->id_trafico)->get();
        $tarimas = db::table('traficos_tarimas as t')
                    ->join('logisticas as a', 'a.id','t.shipping_id')
                    ->leftjoin('estados as e','e.id','=','a.estado')
                    ->leftjoin('paises as p','p.id','=','a.pais')
                    ->where('id_trafico',$request->id_trafico)
                    ->selectraw("t.*, a.calle, a.numero, a.cp, p.nombre as npais, e.estado as nestado, a.municipio as nmunicipio")
                    ->get();

        $traficos_detalle = db::table('traficos_detalle as td')
                                ->where('id_trafico',$request->id_trafico)
                                ->orderby('id_detalle')
                                ->get();

        
        $cliente_actual  = $trafic->cliente_actual($request->id_trafico); 
        $cliente_actual = $cliente_actual[0];

        $logistica->id_cliente = $cliente_actual->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);

        $options = view('traficos.tarimas',compact('tarimas','traficos_detalle','tarimas_idns','logisticas'))->render();

        return json_encode($options);
    }

    function guarda_flete(Request $request){

        $trafico = new Trafico_flete;
        $existe = Trafico_flete::where('id_trafico',$request->id_trafico)->count();

        if($existe > 0 ){
            Trafico_flete::where('id_trafico',$request->id_trafico)
            ->update([  'agencia_mx'        => $request->aduanal_mx,
                        'no_plataforma'     => $request->no_plataforma,
                        'placas'            => $request->placas,
                        'pais_orige'        => $request->pais_or,
                        'largo'             => $request->amb_largo,
                        'scac'              => $request->scac,
                        'caat'              => $request->caat,
                        'no_referencia'     => $request->num_referencia,
                        'entrada_camion'    => $request->entrada_camion,
                        'salida_camion'     => $request->salida_camion,
                        'arancelaria_usa'   => $request->fraccion_arra,
                        'fecha_entrega'     => $request->fecha_entrega,
                        'tipo_cambio'       => $request->tipo_cambio,
                        'arancelaria_mx'    => $request->fraccion_arra_mx,
                        'liberacion_ad_mx'  => $request->fecha_aduana_mx,
                        'liberacion_ad_usa' => $request->fecha_aduana_us,
                        'entrega_bodega'    => $request->fecha_bodega]);
        }else{
            $trafico->id_trafico        = $request->id_trafico;
            $trafico->agencia_mx        = $request->aduanal_mx;
            $trafico->no_plataforma     = $request->no_plataforma;
            $trafico->placas            = $request->placas;
            $trafico->pais_orige        = $request->pais_or;
            $trafico->largo             = $request->amb_largo;
            $trafico->scac              = $request->scac;
            $trafico->caat              = $request->caat;
            $trafico->no_referencia     = $request->num_referencia;
            $trafico->entrada_camion    = $request->entrada_camion;
            $trafico->salida_camion     = $request->salida_camion;
            $trafico->arancelaria_usa   = $request->fraccion_arra;
            $trafico->fecha_entrega     = $request->fecha_entrega;
            $trafico->tipo_cambio       = $request->tipo_cambio;
            $trafico->arancelaria_mx    = $request->fraccion_arra_mx;
            $trafico->liberacion_ad_mx  = $request->fecha_aduana_mx;
            $trafico->liberacion_ad_usa = $request->fecha_aduana_us;
            $trafico->entrega_bodega    = $request->fecha_bodega;
            $trafico->save();
   
        }
    }

    function informacion_trafico(Request $request){
        $trafico = new trafico;
        $trafico->id_trafico = $request->id_trafico;

        $trafi = $trafico->trafico_info($trafico);
        $traficos = $trafi['trafico'];
        $status_prod = $trafi['status_prod'];

        $estatus_calidad = db::select('select t.id_detalle, t.id_trafico, count(*) as conteo
                                       from traficos_detalle t
                                       left join seguimiento_calidad s on s.id_detalle = t.id_detalle and s.estatus = 2
                                       where id_trafico = '.$request->id_trafico.' 
                                       group by t.id_detalle, t.id_trafico');

        $options = view('traficos.trafico_informacion',compact('traficos','status_prod','estatus_calidad'))->render();
        return json_encode($options);
    }

    function packing_list(Request $request){
       # db::select('truncate table tarimas_idns');
        $logistic = new logistica;


        $trafico = db::table('traficos')->where('id',$request->id_trafico)->get();
        $logistic->id_logistica = $trafico[0]->shipping_id;
        $logistica = $logistic->cliente_logisticas_actual($logistic);
        $planta = db::table('plantas as p')
                    ->leftjoin('estados as e', 'e.id','p.estado')
                    ->where('p.id',$trafico[0]->id_planta)
                    ->selectraw('p.*, e.estado as nestado')
                    ->get();
        $planta = $planta[0];
        $logistica = $logistica[0];
        $tarimas_idns = db::table('tarimas_idns as t')
                            ->join('ordencompra_detalle as d','t.idn','d.id')
                            ->join('ordenes_compras as o','o.id','d.id_orden')
                            ->join('productos as p','p.id','d.producto')
                            #->where('id_trafico',$request->id_trafico)
                            #->selectraw('t.*, p.numero_parte, o.orden_compra ')
                            ->where('id_trafico',$request->id_trafico)
                            ->selectraw('t.*,p.numero_parte, o.orden_compra ,d.incremento ')
                            #->groupby('id_tarima','id_trafico')
                            ->get();

        $idns_conteo = tarimas_idns::where('id_trafico',$request->id_trafico)
                       ->groupby('id_tarima')
                       ->selectraw('count(*) as conteo, id_tarima')
                       ->get();

        $tarimas = db::table('traficos_tarimas as t')
                        ->join('tarimas_idns as i','i.id_tarima','t.id')
                        ->where('t.id_trafico',$request->id_trafico)
                        ->selectraw('distinct t.*')
                        ->get();
        
        
        #return view('traficos.packing_list',compact('logistica','planta','tarimas','tarimas_idns','idns_conteo'));
        $pdf = \PDF::loadView('traficos.packing_list',compact('logistica','planta','tarimas','tarimas_idns','idns_conteo'))->setPaper('A4','portrait');
        return $pdf->download('Packing_List_'.$request->id_trafico.'.pdf');
         #Storage::put('Cotizacion_'.$num_cotizacion.'.pdf', $pdf->output());

    }

    function guarda_planta_trafico(Request $request){
        trafico::where('id',$request->id_trafico)->update([$request->campo=>$request->valor]);
        return 1;
    }

    function guarda_fracciones(Request $request){
        $existe = flete_fracciones::where('id_detalle',$request->id)->count();
        if($existe > 0){
            flete_fracciones::where([['id_detalle',$request->id],
                                     ['id_trafico',$request->id_trafico]])
                        ->update([$request->campo=>$request->valor]);
        }else{
            flete_fracciones::insert(['id_trafico'=>$request->id_trafico,
                                      'id_detalle'=>$request->id,
                                      $request->campo=>$request->valor]);    
        }

        return 1;
        
    }

    function report_pod(Request $request){
        $logistic = new logistica;
        $logistic->id_logistica = $request->ship_to;
        $logisticas = $logistic->cliente_logisticas_actual($logistic);
        $pod = $logisticas[0];

        $items = db::table('traficos_detalle as t')
                ->join('tarimas_idns as tar','tar.idn','t.id_detalle')
                ->join('traficos_tarimas as tra','tra.id','tar.id_tarima')
                ->join('ordencompra_detalle as d','t.id_detalle','d.id')
                ->join('ordenes_compras as o','o.id','d.id_orden')
                ->join('productos as p','p.id','d.producto')
                ->where([['t.id_trafico',$request->id_trafico],['tra.shipping_id',$request->ship_to]])
                ->groupby('p.numero_parte','incremento','o.orden_compra','p.descripcion')
                ->selectraw('count(*) as conteo,p.numero_parte, incremento, o.orden_compra, p.descripcion')
                ->get();

        #return view('traficos.pod',compact('items'));
        $pdf = \PDF::loadView('traficos.pod',compact('items','pod'))->setPaper('A4-L','portrait');
        return $pdf->download('POD_'.$request->id_trafico.'-'.$request->ship_to.'.pdf');
    }

    function report_invoice(Request $request){
        $items = db::table('traficos_detalle as t')
                    ->join('ordencompra_detalle as d','t.id_detalle','d.id')
                    ->join('ordenes_compras as o','o.id','d.id_orden')
                    ->join('productos as p','p.id','d.producto')
                    ->where('id_trafico',$request->id_trafico)
                    #->groupby('p.numero_parte','incremento','o.orden_compra','p.descripcion')
                    ->selectraw('1 as conteo,p.numero_parte, incremento, o.orden_compra, p.descripcion, p.costo_produccion')
                    ->get();
        #return view('traficos.invoice',compact('items'));
        $pdf = \PDF::loadView('traficos.invoice',compact('items'))->setPaper('A4-L','portrait');
        return $pdf->download('Invoice_'.$request->id_trafico.'.pdf');
    }

    function report_notificacion(Request $request){
        $trafico = db::table('traficos as t')
                    ->leftjoin('plantas as p','p.id','t.id_planta')
                    ->leftjoin('estados as e','e.id','p.estado')
                    ->leftjoin('paises as pa','pa.id','id_pais')
                    ->where('t.id',$request->id_trafico)
                    ->selectraw('t.*, p.*, e.estado, pa.nombre as npais')
                    ->get();
        $trafico = $trafico[0];
        $info = Trafico_flete::where('id_trafico',$request->id_trafico)->get();
        $info = $info[0];
       #return view('traficos.notificacion_embarque',compact('info','trafico')); 
        $pdf = \PDF::loadView('traficos.notificacion_embarque',compact('info','trafico'))->setPaper('A4-L','portrait');
        return $pdf->download('Notificacion_Embarque_'.$request->id_trafico.'.pdf');
    }

    function complemento_ext(Request $request){
        $trafico = db::table('traficos_detalle as t')
                    ->join('ordencompra_detalle as d','t.id_detalle','d.id')
                    ->join('ordenes_compras as o','o.id','d.id_orden')
                    ->join('productos as p','p.id','d.producto')
                    ->where('id_trafico',$request->id_trafico)
                    ->selectraw('p.numero_parte, t.id_detalle, t.id_trafico')
                    ->get();
       #return view('traficos.complemento_ext',compact('trafico')); 
        $pdf = \PDF::loadView('traficos.complemento_ext',compact('trafico'))->setPaper('A4-L','portrait');
        return $pdf->download('Complemento_Comercio_Ext_'.$request->id_trafico.'.pdf');
    }

    function nueva_tarima(Request $request){
        $trafic = new trafico();
        $logistica = new logistica;

        $trafico = $request->trafico;
        $cliente_actual  = $trafic->cliente_actual($trafico); 
        $cliente_actual = $cliente_actual[0];

        $logistica->id_cliente = $cliente_actual->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);
        
        if($request->id==0){
            $tarimas = array('id'=>0,
                             'peso'=>'',
                             'altura'=>'',
                             'ancho'=>'',
                             'largo'=>'',
                             'pero_tarima'=>'',
                             'shipping_id'=>''
                        );

            $tarimas = (object)$tarimas;
            $traficos_detalle = db::table('traficos_detalle')->where('id_trafico',$trafico)->orderby('id_detalle')->get();
        }else{
            $tarimas = db::table('traficos_tarimas')->where('id',$request->id)->get();    
            $tarimas = $tarimas[0];

            $traficos_detalle = db::table('traficos_detalle as td')
                                ->join('ordencompra_detalle as od','td.id_detalle','od.id')
                                ->join('ordenes_compras as o','o.id','od.id_orden')
                                ->where([['id_trafico',$request->trafico],['shipping',$tarimas->shipping_id]])
                                ->selectraw('td.*, o.shipping')
                                ->orderby('id_detalle')
                                ->get();
        }
        
        $tarimas_idns = tarimas_idns::where('id_trafico',$trafico)->get();
        

        $options = view('traficos.nuevo_trafico',compact('trafico','logisticas','traficos_detalle','tarimas','tarimas_idns'))->render();
        return json_encode($options);
    }

    function obtiene_idns_trafico(Request $request){
        $trafico = $request->trafico;

        $traficos_detalle = db::table('traficos_detalle as td')
                                ->join('ordencompra_detalle as od','td.id_detalle','od.id')
                                ->join('ordenes_compras as o','o.id','od.id_orden')
                                ->where([['id_trafico',$trafico],['shipping',$request->ship_to]])
                                ->selectraw('td.*, o.shipping')
                                ->orderby('id_detalle')
                                ->get();
        $select = "<option>Seleccione...</option>";
        foreach ($traficos_detalle as $detalle) {
           $select .= "<option value= '".$detalle->id."'>".$detalle->id."</option>"; 
        }

        return json_encode($select);
    }
    
}
