<?php

namespace App\Http\Controllers;

use App\Models\ordenes_compra;
use App\Models\productos;
use App\Models\logistica;
use App\Models\clientes;
use App\Models\plantas;
use App\Http\Requests\Createordenes_compraRequest;
use App\Http\Requests\Updateordenes_compraRequest;
use App\Repositories\ordenes_compraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use Sesion;
use DB; 
use View;
use PDF;

class ordenes_compraController extends AppBaseController
{
    /** @var  ordenes_compraRepository */
    private $ordenesCompraRepository;

    public function __construct(ordenes_compraRepository $ordenesCompraRepo){
        $this->ordenesCompraRepository = $ordenesCompraRepo;
    }

    public function index(Request $request){
        $orden = new ordenes_compra;
        $ordenesCompras = $orden->ordenesCompra();

        return view('ordenes_compras.index',compact('ordenesCompras'));
    
    }

    function create(Request $request){
        $logistica = new logistica;
        $orden = new ordenes_compra;

        if ($request->session()->has('num_orden')) {
             
         $num_orden = $request->session()->get('num_orden');

         }else{
            $fecha = date('Y-m-d');

            $id = DB::table('ordenes_compras')
                    ->insertGetId(['id_cotizacion'=>0,
                                   'cliente'=>0,
                                   'notas'=>'',
                                   'income'=>0,     
                                   'termino_pago'=>0,
                                   'vendedor'=>auth()->id(),
                                   'fecha' => $fecha,
                                   'orden_compra'=>'',
                                   'lugar'=>'',
                                   'tipo'=>1]);       
            $request->session()->put('num_orden',$id);
            $num_orden = $request->session()->get('num_orden');

         }
        

        $ordenesCompra = $orden->header_orden($num_orden);
        $detalle = $orden->detalle_orden($num_orden,0);
        $income = DB::table('income_terms')->get();
        $clientes = clientes::get();
        $productos = productos::where('id_empresa',$ordenesCompra->cliente)->get();  
        $logistica->id_cliente = $ordenesCompra->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);

        return view('ordenes_compras.create',compact('ordenesCompra','detalle','income','clientes','productos','logisticas'));

    }

    
    public function show($id){
        $orden = new ordenes_compra;
        $logistica = new logistica;

        $ordenesCompra = $orden->header_orden($id);
        $detalle = $orden->detalle_orden($id,0);
        $income = DB::table('income_terms')->get();
        $logistica->id_cliente = $ordenesCompra->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);

        return view('ordenes_compras.show',compact('ordenesCompra','detalle','income','logisticas'));
    }

    public function edit($id){
        $orden = new ordenes_compra;
        $logistica = new logistica;

        $ordenesCompra = $orden->header_orden($id);
        $detalle = $orden->detalle_orden($id,1);
        $plantas = db::table('plantas')->get();
        $income = DB::table('income_terms')->get();
        $logistica->id_cliente = $ordenesCompra->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);

        return view('ordenes_compras.edit',compact('detalle','ordenesCompra','income','plantas','logisticas'));
    }

    
    function convierteocc(Request $request){
        $fecha = date('Y-m-d');

        db::table('cotizaciones')
        ->where('id',$request->id_cotizacion)
        ->update(['enviado'=>3]);

        $cotizacion = db::table('cotizaciones')
                      ->where('id',$request->id_cotizacion)
                      ->get();
        $cotizacion = $cotizacion[0];
        $insertado = db::table('ordenes_compras')
                        ->insertGetId(['id_cotizacion'=>$cotizacion->id,
                                      'cliente'=>$cotizacion->cliente,
                                      'notas'=>'',
                                      'income'=>$cotizacion->income,
                                      'termino_pago'=>$cotizacion->termino_pago,
                                      'vendedor'=>$cotizacion->vendedor,
                                      'fecha'=>$fecha,
                                      'tipo'=>1,
                                      'lugar'=>$cotizacion->lugar]);

        $detalle_cotiza = db::table('cotizacion_detalle')
                                ->where('id_cotizacion',$request->id_cotizacion)
                                ->get();

        foreach ($detalle_cotiza as $detalle) {
            db::table('ordencompra_detalle')
                ->insert(['id_orden'=>$insertado,
                          'incremento'=>0,
                          'producto'=>$detalle->producto,
                          'dibujo'=>$detalle->dibujo,
                          'cantidad'=>$detalle->cantidad,
                          'costo'=>$detalle->costo,
                          'incremento'=>1,
                          'hijo'=>0
                      ]);
        }

        if($request->tipo==2){
            $request->session()->forget('num_cot');
        }
        return $insertado;
    }

    function validar_orden(Request $request){
        $orden = new ordenes_compra;

        ordenes_compra::where('id',$request->id_orden)
        ->update(['tipo'=>2,
                  'notas'=>$request->notas,
                  'income'=>$request->income]);
    
        $orden->id_orden = $request->id_orden;
        $orden->agrega_cantidades($orden);
        $request->session()->forget('num_orden');
        return 1;
    }

    function actualiza_producto_occ(Request $request){
        $orden = new ordenes_compra;
        $logistica = new logistica;

        db::table('ordencompra_detalle')
        ->where('id',$request->producto)
        ->update(['cantidad'=>$request->cantidad]);


        $plantas = db::table('plantas')->get();
        $id = $request->id_ot;
        $ordenesCompra = $orden->header_orden($id);

        $detalle = $orden->detalle_orden($id,1);

        $editar = 0;
        $nuevo = 1;
        $clientes = clientes::get();
        $productos = productos::where('id_empresa',$ordenesCompra->cliente)->get();  
        $logistica->id_cliente = $ordenesCompra->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);
        $income = DB::table('income_terms')->get();
        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas','nuevo','clientes','productos','logisticas','income'))->render();

        return json_encode($options);
    }

    function actualiza_producto_occ_det(Request $request){
        $orden = new ordenes_compra;
        $logistica = new logistica;

        db::table('ordencompra_detalle')
        ->where('id',$request->producto)
        ->update(['incremento'=>$request->incremento,
                  'fecha_entrega'=>$request->fecha_entrega,
                  'planta'=>$request->planta,
                  'nota_det'=>$request->notas_det]);
        $plantas = db::table('plantas')->get();

        $id = $request->id_ot;
        $ordenesCompra = $orden->header_orden($id);

        $detalle = $orden->detalle_orden($id,1);

        $editar = 0;
        $nuevo = 1;
        $clientes = clientes::get();
        $productos = productos::where('id_empresa',$ordenesCompra->cliente)->get();  
        $logistica->id_cliente = $ordenesCompra->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);
        $income = DB::table('income_terms')->get();
        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas','nuevo','clientes','productos','logisticas','income'))->render();

        return json_encode($options);
    }

    function borra_producto_occ(Request $request){
        $orden = new ordenes_compra;
        $logistica = new logistica;
        $plantas = db::table('plantas')->get();

        db::table('ordencompra_detalle')
            ->where('id',$request->producto)
            ->delete();

        db::table('ordentrabajo_seguimiento')
            ->where('id_detalle',$request->producto)
            ->delete();

        

        $id = $request->id_ot;
        $ordenesCompra = $orden->header_orden($id);

        $detalle = $orden->detalle_orden($id,1);

        $editar = 0;
        $nuevo = 1;
        $clientes = clientes::get();
        $productos = productos::where('id_empresa',$ordenesCompra->cliente)->get();  
        $logistica->id_cliente = $ordenesCompra->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);
        $income = DB::table('income_terms')->get();
        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas','nuevo','clientes','productos','logisticas','income'))->render();

        return json_encode($options);

    }

    function actualiza_info_occ(Request $request){
        $orden = new ordenes_compra;
        $logistica = new logistica;
        db::table('ordenes_compras')
        ->where('id',$request->orden)
        ->update(['orden_compra'=>$request->orden_compra,
                  'notas'=>$request->notas,
                  'income'=>$request->income,
                  'lugar'=>$request->lugar,
                  'shipping'=>$request->logistica]);

        $editar = 0;    
        $id = $request->orden;
         $plantas = db::table('plantas')->get();
        $ordenesCompra = $orden->header_orden($id);

        $detalle = $orden->detalle_orden($id,1);
        $nuevo = 1;
        $clientes = clientes::get();
        $productos = productos::where('id_empresa',$ordenesCompra->cliente)->get();  
        $logistica->id_cliente = $ordenesCompra->cliente;
        $logisticas = $logistica->cliente_logisticas($logistica);
        $income = DB::table('income_terms')->get();

        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas','nuevo','clientes','productos','logisticas','income'))->render();
        return json_encode($options);
    }

    function seguimiento($id){
        $orden = new ordenes_compra;
        $ordenesCompra = $orden->header_orden($id);

        $productos = db::table('ordencompra_detalle as d')
                        ->join('productos as pr','pr.id','d.producto')
                        ->join('clientes as c','id_empresa','c.id')
                        ->leftjoin('seguimiento_planeacion as sp','d.id','sp.id_detalle')
                        ->where('d.id_orden',$id)
                        ->selectraw('pr.*, pr.id as idproducto, sp.*, d.planta as idplanta, d.id_orden as id_orden, nombre_corto, d.id as id_detalle, pr.numero_parte, d.incremento, d.fecha_entrega')
                        ->orderby('d.id','asc')
                        ->get();
       

         $plantas = DB::table('plantas')->get();       

         $procesos = $orden->get_procesos_ordenes($id);
         $sub_procesos = $orden->get_sub_procesos_ordenes($id);
        # dd($sub_procesos);
    
        return view('ordenes_compras.seguimiento',compact('ordenesCompra','productos','plantas','procesos','sub_procesos'));
    }

    function obtiene_seguimiento(Request $request){

        $id_detalle = $request->id_detalle;
        $procesos = db::table('ordentrabajo_seguimiento as o')
                    ->join('procesos as pp','pp.id','o.id_proceso')
                    ->selectraw('distinct pp.id, pp.procesos, pp.descripcion')
                    ->where('o.id_detalle',$id_detalle)
                    ->get();
        $subprocesos = db::table('ordentrabajo_seguimiento as o')
                        ->join('subprocesos as s','o.id_subproceso','s.id')
                        ->where('o.id_detalle',$id_detalle)
                        ->selectraw('distinct s.id, s.subproceso, o.id_proceso, o.fecha_inicio, o.foto, o.dias')
                        ->get();



     $options =  view('ordenes_compras.informe_seguimiento',compact('id_detalle','procesos','subprocesos'))->render();   
     return json_encode($options);
    }


    function seguimiento_subproceso(Request $request){
        $filtro = new ordenes_compra;
        $filtro->id_producto = $request->id_producto;
        $filtro->id_proceso = $request->id_proceso;
        $filtro->id_detalle = $request->id_detalle;

        $subprocesos = $filtro->informacion_subprocesos($filtro);

        $options = view('ordenes_compras.info_subprocesos',compact('subprocesos'))->render();
        return json_encode($options);

    }

    function informacion_producto(Request $request){

        $filtro = new ordenes_compra;
        $filtro->id_producto = $request->id_producto;

        $producto = $filtro->informacion_producto($filtro);
        #dd($producto);
        $producto = $producto[0];

        $options = view('ordenes_compras.producto_info',compact('producto'))->render();
        return json_encode($options);
    }

    function seguimiento_calidad(Request $request){
        $options = view('ordenes_compras.informe_seguimiento')->render();
        return json_encode($options);
    }

     function agrega_comentarios(Request $request){
        $filtro = new ordenes_compra;
        $filtro->id_detalle = $request->id_detalle;
        $filtro->id_orden   = $request->id_orden;
        $filtro->columna    = $request->id_columna;

        $data = $filtro->get_comentario($filtro);
        
        if(sizeof($data) >0){
            $data = $data[0];

            if($request->columna==2){
                $col = $data->lanzamiento;
                $nom_col = "Lanzamiento";
            }else if($request->columna==3){
                $col = $data->informacion;
                $nom_col = "Información";
            }else if($request->columna==4){
                $col = $data->pregunta;
                $nom_col = "Pregunta";
            }else if($request->columna==5){
                $col = $data->pintura;
                $nom_col = "Pintura";
            }else if($request->columna==6){
                $col = $data->prog_corte;
                $nom_col = "Prog. Corte";
            }else if($request->columna==7){
                $col = $data->tacm;
                $nom_col = "TACM";
            }
        }else{
            $col = '';
            if($request->columna==2){
                $nom_col = "Lanzamiento";
            }else if($request->columna==3){
                $nom_col = "Información";
            }else if($request->columna==4){
                $nom_col = "Pregunta";
            }else if($request->columna==5){
                $nom_col = "Pintura";
            }else if($request->columna==6){
                $nom_col = "Prog. Corte";
            }else if($request->columna==7){
                $nom_col = "TACM";
            }
        }



        $data = array('id_orden'=>$request->id_orden,
                      'id_detalle'=>$request->id_detalle,
                      'valor'=>$col,
                      'columna'=>$request->columna,
                      'nom_col'=>$nom_col);

        #dd($data);
        $options = view('ordenes_compras.seguimiento_comentarios',compact('data'))->render();
        return json_encode($options);
    }

    function guarda_seguimiento(Request $request){

        $filtro = new ordenes_compra;
        $filtro->id_detalle = $request->id_detalle;
        $filtro->id_orden   = $request->id_orden;
        $filtro->columna    = $request->id_columna;
        $filtro->valor      = $request->comentario;

        $informacion = $filtro->guardar_seguimiento($filtro);
        
    }

    function guarda_detalles_pro(Request $request){
        $filtro = new ordenes_compra;
        $filtro->id_detalle = $request->id_detalle;
        $filtro->id_orden   = $request->id_orden;
        $filtro->columna    = $request->columna;
        $filtro->valor      = $request->valor;

        $informacion = $filtro->guardar_seguimiento($filtro);

    }

    function configura_metariales(Request $request){
        $filtro = new ordenes_compra;
        $filtro->id_detalle = $request->id_detalle;

        $materiales = $filtro->get_materiales($filtro);

        $material = $materiales['materiales'];
        $mat_forma = $materiales['mat_formas'];

      #  dd($material);
        $options = view('ordenes_compras.seguimiento_materiales',compact('material','mat_forma'))->render();
        return json_encode($options);

    }
    function agrega_producto_ot(Request $request){
        
        $orden = new ordenes_compra;
        $logistica  = new logistica;

        
        $existe = db::table('ordencompra_detalle')->where([['id_orden',$request->id_orden],['producto',$request->producto_ot]])->count();
        if($existe > 0){    
            return  json_encode(1);
        }else{
            $info_producto  = DB::select('SELECT p.descripcion, p.tiempo_entrega,p.id_empresa, p.peso, ifnull(p.costo_material,0) as costo_material, ifnull(p.costo_produccion,0) as costo_produccion, p.costo_material,dibujo_nombre, revision,ifnull(d.id,0) as id
                                      FROM productos p
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto,id
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = '.$request->producto_ot.')) d ON d.id_producto = p.id
                                      where p.id ='. $request->producto_ot);
            $info_producto = $info_producto[0];

            db::table('ordencompra_detalle')->insert(['id_orden'=>$request->id_orden,
                                         'incremento'=>0,
                                         'producto'=>$request->producto_ot,
                                         'dibujo'=>$info_producto->id,
                                         'cantidad'=>1,
                                         'fecha_entrega'=>date('Y-m-d'),
                                         'costo'=>$info_producto->costo_produccion,
                                         'hijo'=>0
                                     ]); 
            ordenes_compra::where('id',$request->id_orden)->update(['cliente'=>$info_producto->id_empresa]);
            $ordenesCompra = $orden->header_orden($request->id_orden);
            $detalle = $orden->detalle_orden($request->id_orden,1);
            $editar = 0;
            $nuevo = 1;
            $plantas = db::table('plantas')->get();
            $clientes = clientes::get();
            $productos = productos::where('id_empresa',$ordenesCompra->cliente)->get();  
            $logistica->id_cliente = $ordenesCompra->cliente;
            $logisticas = $logistica->cliente_logisticas($logistica);   
            $income = DB::table('income_terms')->get();
            $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas','clientes','nuevo','productos','logisticas','income'))->render();
            return json_encode($options);

        }
        
    }

    function obtiene_producto_ot(Request $request){
        $cliente = ordenes_compra::where('id',$request->id_orden)
                    ->get();          

        if($cliente[0]->cliente != $request->cliente){
            db::table('ordencompra_detalle')
            ->where('id_orden',$request->id_orden)
            ->delete();
        }
        
        $productos = productos::where('id_empresa',$request->cliente)->get();

        $prod = '<option value="">Seleccione una opcion</option>';
        foreach ($productos as $p) {
            $prod .= '<option value="'.$p->id.'">'.$p->numero_parte.'</option>';
        }

        return json_encode($prod);
    }

    function orden_factura(Request $request){
        $orden = new ordenes_compra;
        $detalle = $orden->detalle_orden(37,1);

        return view('ordenes_compras.plantilla_factura',compact('detalle'));
    }

    function ordenesporenviar(Request $request){
        $orden = new ordenes_compra;
        $plantas = $orden->obtiene_plantas();
        $detalle = array();

        return view('ordenes_compras.ordnesporenviar',compact('plantas','detalle'));
    }

    function obtiene_info_plantas(Request $request){
        $orden = new ordenes_compra;
        $orden->id_planta = $request->id_planta;
        $detalle = $orden->obtiene_info_plantas($orden);

        $option =  view('ordenes_compras.tabla_plantas',compact('detalle'))->render();
        return json_encode($option);
    }

    function envia_info_planta(Request $request){
        $orden = new ordenes_compra;
        $orden->id_planta = $request->id_planta;
        $detalle = $orden->obtiene_info_plantas($orden);

        $pdf = \PDF::loadView('ordenes_compras.plantilla_factura',compact('detalle'))->setPaper('A4-L','landscape');
        return $pdf->download('OrdenTrabajoPlanta_'.$request->id_planta.'.pdf');

    }
}
