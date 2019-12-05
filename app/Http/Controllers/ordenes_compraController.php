<?php

namespace App\Http\Controllers;

use App\Models\ordenes_compra;
use App\Http\Requests\Createordenes_compraRequest;
use App\Http\Requests\Updateordenes_compraRequest;
use App\Repositories\ordenes_compraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use DB;
use View;

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

    
    public function show($id){
        $orden = new ordenes_compra;

        $ordenesCompra = $orden->header_orden($id);
        $detalle = $orden->detalle_orden($id,0);
        $income = DB::table('income_terms')->get();

        return view('ordenes_compras.show',compact('ordenesCompra','detalle','income'));
    }

    public function edit($id){
        $orden = new ordenes_compra;

        $ordenesCompra = $orden->header_orden($id);
        $detalle = $orden->detalle_orden($id,1);
        $plantas = db::table('plantas')->get();
        $income = DB::table('income_terms')->get();

        return view('ordenes_compras.edit',compact('detalle','ordenesCompra','income','plantas'));
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


        /**
        db::table('ordenes_compras') 
        ->where('id',$request->id_orden)
        ->update(['tipo'=>2,
                  'notas'=>$request->notas,
                  'income'=>$request->income]);
        */
    
        $orden->id_orden = $request->id_orden;
        $orden->agrega_cantidades($orden);
        return 1;
    }
/**
    function agregar_productos(Request $request){
        $orden = new ordenes_compra;

        $editar = 1;

        db::select("insert into ordencompra_detalle(id_orden,incremento, producto, dibujo,cantidad,costo,hijo)
                    select id_orden,max(incremento) + 1, producto, dibujo,cantidad,costo,1
                    from ordencompra_detalle
                    where id = ".$request->id_detalle.'
                    group by id_orden,producto, dibujo,cantidad,costo');

        db::select('insert into ordentrabajo_seguimiento(id_orden,id_detalle,id_producto,id_proceso,id_subproceso)
                    select o.id_orden,o.id,producto,p.id_proceso, p.id_subproceso
                    from ordencompra_detalle o 
                    inner join productos_subprocesos p on p.id_producto = o.producto 
                    where o.id ='.$request->id_detalle.'
                    and o.id not in (select distinct id_detalle from ordentrabajo_seguimiento where id_orden = '.$request->id_ot.')');

        $id = $request->id_ot;
        
        $ordenesCompra = $orden->header_orden($id);
        $plantas = db::table('plantas')->get();
        $detalle = $orden->detalle_orden($id,1);

        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();
        return json_encode($options);

    }

    */

    function actualiza_producto_occ(Request $request){
        $orden = new ordenes_compra;

        db::table('ordencompra_detalle')
        ->where('id',$request->producto)
        ->update(['cantidad'=>$request->cantidad]);


        $plantas = db::table('plantas')->get();
        $id = $request->id_ot;
        $ordenesCompra = $orden->header_orden($id);

        $detalle = $orden->detalle_orden($id,1);

        $editar = 0;
        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();

        return json_encode($options);
    }

    function actualiza_producto_occ_det(Request $request){
        $orden = new ordenes_compra;

        db::table('ordencompra_detalle')
        ->where('id',$request->producto)
        ->update(['incremento'=>$request->incremento,
                  'fecha_entrega'=>$request->fecha_entrega,
                  'planta'=>$request->planta]);
        $plantas = db::table('plantas')->get();

        $id = $request->id_ot;
        $ordenesCompra = $orden->header_orden($id);

        $detalle = $orden->detalle_orden($id,1);

        $editar = 1;
        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();

        return json_encode($options);
    }

    function borra_producto_occ(Request $request){
        $orden = new ordenes_compra;
        $plantas = db::table('plantas')->get();

        db::table('ordencompra_detalle')
            ->where('id',$request->producto)
            ->delete();

        db::table('ordentrabajo_seguimiento')
            ->where('id_detalle',$request->producto)
            ->delete();



        $editar = 1;    
        $id = $request->id_ot;
        $ordenesCompra = $orden->header_orden($id);

        $detalle = $orden->detalle_orden($id,1);

        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();
        return json_encode($options);

    }

    function actualiza_info_occ(Request $request){
        $orden = new ordenes_compra;
        db::table('ordenes_compras')
        ->where('id',$request->orden)
        ->update(['orden_compra'=>$request->orden_compra,
                  'notas'=>$request->notas,
                  'income'=>$request->income]);

        $editar = 0;    
        $id = $request->orden;
         $plantas = db::table('plantas')->get();
        $ordenesCompra = $orden->header_orden($id);

        $detalle = $orden->detalle_orden($id,1);

        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();
        return json_encode($options);
    }

    function seguimiento($id){
        $orden = new ordenes_compra;
        $ordenesCompra = $orden->header_orden($id);

        $productos = db::table('ordencompra_detalle as d')
                        ->join('productos as pr','pr.id','d.producto')
                        ->where('d.id_orden',$id)
                        ->selectraw('pr.*, pr.numero_parte, d.incremento, d.fecha_entrega')
                        ->orderby('d.id','asc')
                        ->get();
       

         $plantas = DB::table('plantas')->get();


        return view('ordenes_compras.seguimiento',compact('ordenesCompra','productos','plantas'));
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

    function guarda_seguimiento(Request $request){

        $id_seguimiento = $request->id_seguimiento;

        $file_img = $request->image;
        return $request->all();

        if(!empty($file_img)){

              
            $img = Storage::url($file_img->store('image', 'images'));
            
            /**$imgp = strpos($img,'/storage/');
            $img = substr($img, $imgp, strlen($img));
            
            DB::table('producto_dibujos')
                ->where('id',$request->iddibujo)
                ->update(['dibujo'=>$img]);*/
        }
        
    }
}
