<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
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
                            ->selectraw('o.orden_compra, c.nombre_corto')
                            ->get();
        return view('factura.index',compact('ordenes_compra'));
    }

    function muestra_line_productos(Request $request){
        $options = view('factura.informacion')->render();
        return json_encode($options);
    }

    function muestra_line_facturado(Request $request){
     $options = view('factura.info_factura')->render();   
     return json_encode($options);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturacion $facturacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturacion $facturacion)
    {
        //
    }
}
