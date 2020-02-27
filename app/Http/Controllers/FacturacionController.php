<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use App\Models\invoices;
use App\Models\ordenes_compra;
use Illuminate\Http\Request;
use DB;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes_compra = db::table('ordenes_compras as o')
                            ->join('clientes as c', 'c.id','o.cliente')
                            ->WhereNotNUll('orden_compra')
                            ->selectraw('distinct o.orden_compra, c.nombre_corto')
                            ->get();
        return view('factura.index',compact('ordenes_compra'));
    }

    function muestra_line_productos(Request $request){
        $informacion = db::table('ordenes_compras as o')
                        ->join('ordencompra_detalle as d','o.id','d.id_orden')
                        ->join('traficos_detalle as td','td.id_detalle','d.id')
                        ->leftjoin('productos as p','p.id','d.producto')
                        ->leftjoin('invoices as i','i.id_orden','o.id')
                        ->where('o.orden_compra',$request->id_orden)
                        ->selectraw('p.numero_parte, o.orden_compra,d.id, td.id_trafico, d.incremento,d.fecha_entrega, i.id as invoice')
                        ->get();
/**
        $informacion = db::table('ordenes_compras as o')
                        ->join('ordencompra_detalle as d','o.id','d.id_orden')
                        ->where('o.orden_compra',$request->id_orden)
                        ->get();*/
        #dd($informacion);
        $options = view('factura.informacion',compact('informacion'))->render();
        return json_encode($options);
    }

    function muestra_line_facturado(Request $request){
        $informacion = invoices::where('orden_compra',$request->id_orden)->get();
        /**dd($var);
     $informacion = db::table('ordenes_compras as o')
                        ->join('ordencompra_detalle as d','o.id','d.id_orden')
                        ->join('traficos_detalle as td','td.id_detalle','d.id')
                        ->leftjoin('invoices as i','i.id_trafico','o.id')
                        ->selectraw('distinct td.id_trafico, o.orden_compra, i.id as invoice')
                        ->where('o.orden_compra',$request->id_orden)
                        ->get();*/
    #dd($informacion);

     $options = view('factura.info_factura',compact('informacion'))->render();   
     return json_encode($options);
    }
    
    function actualiza_monto_factura(Request $request){
        invoices::where('id',$request->id)
                ->update(['monto_pagado'=>$request->valor,
                          'fecha_pago'=>date('Y-m-d')]);

        $informacion = invoices::where('orden_compra',$request->occ)->get();
        $options = view('factura.info_factura',compact('informacion'))->render();   
        
        return json_encode($options);

    }
}
