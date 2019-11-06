<?php

namespace App\Http\Controllers;

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

    public function __construct(ordenes_compraRepository $ordenesCompraRepo)
    {
        $this->ordenesCompraRepository = $ordenesCompraRepo;
    }

    /**
     * Display a listing of the ordenes_compra.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $ordenesCompras = db::table('ordenes_compras as c')
                        ->leftjoin('users as u','u.id','c.vendedor')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->selectraw('c.*, name, cl.nombre_corto')
                        ->get();

        return view('ordenes_compras.index',compact('ordenesCompras'));
    
    }

    /**
     * Show the form for creating a new ordenes_compra.
     *
     * @return Response
     */
    public function create()
    {
        return view('ordenes_compras.create');
    }

    /**
     * Store a newly created ordenes_compra in storage.
     *
     * @param Createordenes_compraRequest $request
     *
     * @return Response
     */
    public function store(Createordenes_compraRequest $request)
    {
        $input = $request->all();

        $ordenesCompra = $this->ordenesCompraRepository->create($input);

        Flash::success('Ordenes Compra saved successfully.');

        return redirect(route('ordenesCompras.index'));
    }

    /**
     * Display the specified ordenes_compra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $ordenesCompra = DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];

        $detalle = db::select('select c.*, 1 as conteo, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from ordencompra_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join ordencompra_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_orden = '.$id.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_orden = '.$id .'
                                order by c.id desc
                                limit 1');
        $income = DB::table('income_terms')->get();
        return view('ordenes_compras.show',compact('ordenesCompra','detalle','income'));
    }

    /**
     * Show the form for editing the specified ordenes_compra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $ordenesCompra = DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];

        $plantas = db::table('plantas')->get();

        $detalle = db::select('select c.*, co.conteo, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from ordencompra_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join ordencompra_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_orden = '.$id.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                left join (select count(id) as conteo, producto
                                           from  ordencompra_detalle 
                                           WHERE id_orden = '.$id.'
                                           group by producto ) as co on co.producto = c.producto
                                where c.id_orden = '.$id);
        $income = DB::table('income_terms')->get();
 

        return view('ordenes_compras.edit',compact('detalle','ordenesCompra','income','plantas'));
    }

    /**
     * Update the specified ordenes_compra in storage.
     *
     * @param int $id
     * @param Updateordenes_compraRequest $request
     *
     * @return Response
     */
    public function update($id, Updateordenes_compraRequest $request)
    {
        $ordenesCompra = $this->ordenesCompraRepository->find($id);

        if (empty($ordenesCompra)) {
            Flash::error('Ordenes Compra not found');

            return redirect(route('ordenesCompras.index'));
        }

        $ordenesCompra = $this->ordenesCompraRepository->update($request->all(), $id);

        Flash::success('Ordenes Compra updated successfully.');

        return redirect(route('ordenesCompras.index'));
    }

    /**
     * Remove the specified ordenes_compra from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ordenesCompra = $this->ordenesCompraRepository->find($id);

        if (empty($ordenesCompra)) {
            Flash::error('Ordenes Compra not found');

            return redirect(route('ordenesCompras.index'));
        }

        $this->ordenesCompraRepository->delete($id);

        Flash::success('Ordenes Compra deleted successfully.');

        return redirect(route('ordenesCompras.index'));
    }

    function convierteocc(Request $request){
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
                                      'notas'=>$cotizacion->id_notas,
                                      'income'=>$cotizacion->income,
                                      'termino_pago'=>$cotizacion->termino_pago,
                                      'vendedor'=>$cotizacion->vendedor,
                                      'fecha'=>$cotizacion->fecha,
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
                          'incremento'=>1
                      ]);
        }

        return 1;
    }

    function validar_orden(Request $request){
        db::table('ordenes_compras')
        ->where('id',$request->id_orden)
        ->update(['tipo'=>2,
                  'notas'=>$request->notas,
                  'income'=>$request->income]);
        db::update('delete from ordentrabajo_seguimiento where id_orden ='.$request->id_orden);

        db::select('insert into ordentrabajo_seguimiento(id_orden,id_detalle,id_producto,id_proceso,id_subproceso)
                    select o.id_orden,o.id,producto,p.id_proceso, p.id_subproceso
                    from ordencompra_detalle o 
                    inner join productos_subprocesos p on p.id_producto = o.producto 
                    where id_orden ='.$request->id_orden);
        return 1;
    }

    function agregar_productos(Request $request){
        $editar = 1;
        db::select("insert into ordencompra_detalle(id_orden,incremento, producto, dibujo,cantidad,costo)
                    select id_orden,max(incremento) + 1, producto, dibujo,cantidad,costo
                    from ordencompra_detalle
                    where id_orden = ".$request->id_ot.'
                    group by id_orden,producto, dibujo,cantidad,costo');

        db::select('insert into ordentrabajo_seguimiento(id_orden,id_detalle,id_producto,id_proceso,id_subproceso)
                    select o.id_orden,o.id,producto,p.id_proceso, p.id_subproceso
                    from ordencompra_detalle o 
                    inner join productos_subprocesos p on p.id_producto = o.producto 
                    where id_orden ='.$request->id_ot.'
                    and o.id not in (select distinct id_detalle from ordentrabajo_seguimiento where id_orden = '.$request->id_ot.')');

        $id = $request->id_ot;
        $ordenesCompra = DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];
        $plantas = db::table('plantas')->get();

        $detalle = db::select('select c.*, numero_parte, co.conteo, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from ordencompra_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join ordencompra_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_orden = '.$id.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                left join (select count(id) as conteo, producto
                                           from  ordencompra_detalle 
                                           WHERE id_orden = '.$id.'
                                           group by producto ) as co on co.producto = c.producto
                                where c.id_orden = '.$id );

        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();
        return json_encode($options);

    }

    function actualiza_producto_occ(Request $request){
        db::table('ordencompra_detalle')
        ->where('id',$request->producto)
        ->update(['cantidad'=>$request->cantidad]);


        $plantas = db::table('plantas')->get();
        $id = $request->id_ot;
        $ordenesCompra = DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];

        $detalle = db::select('select c.*, numero_parte, 1 as conteo, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from ordencompra_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join ordencompra_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_orden = '.$id.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_orden = '.$id .'
                                order by c.id desc
                                limit 1');
        $editar = 0;
        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();

        return json_encode($options);
    }

    function actualiza_producto_occ_det(Request $request){
        db::table('ordencompra_detalle')
        ->where('id',$request->producto)
        ->update(['incremento'=>$request->incremento,
                  'fecha_entrega'=>$request->fecha_entrega,
                  'planta'=>$request->planta]);
        $plantas = db::table('plantas')->get();

        $id = $request->id_ot;
        $ordenesCompra = DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];

        $detalle = db::select('select c.*, numero_parte, 1 as conteo, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from ordencompra_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join ordencompra_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_orden = '.$id.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_orden = '.$id);
        $editar = 1;
        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();

        return json_encode($options);
    }

    function borra_producto_occ(Request $request){
        $plantas = db::table('plantas')->get();

        db::table('ordencompra_detalle')
            ->where('id',$request->producto)
            ->delete();

        db::table('ordentrabajo_seguimiento')
            ->where('id_detalle',$request->producto)
            ->delete();



        $editar = 1;    
        $id = $request->id_ot;
        $ordenesCompra = DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];

        $detalle = db::select('select c.*, numero_parte, co.conteo, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from ordencompra_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join ordencompra_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_orden = '.$id.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                left join (select count(id) as conteo, producto
                                           from  ordencompra_detalle 
                                           WHERE id_orden = '.$id.'
                                           group by producto ) as co on co.producto = c.producto
                                where c.id_orden = '.$id );

        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();
        return json_encode($options);

    }

    function actualiza_info_occ(Request $request){
        db::table('ordenes_compras')
        ->where('id',$request->orden)
        ->update(['orden_compra'=>$request->orden_compra,
                  'notas'=>$request->notas,
                  'income'=>$request->income]);

        $editar = 0;    
        $id = $request->orden;
         $plantas = db::table('plantas')->get();
        $ordenesCompra = DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];

        $detalle = db::select('select c.*, numero_parte, co.conteo, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from ordencompra_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join ordencompra_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_orden = '.$id.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                left join (select count(id) as conteo, producto
                                           from  ordencompra_detalle 
                                           WHERE id_orden = '.$id.'
                                           group by producto ) as co on co.producto = c.producto
                                where c.id_orden = '.$id );

        $options =  view('ordenes_compras.detalle',compact('ordenesCompra','detalle','editar','plantas'))->render();
        return json_encode($options);
    }

    function seguimiento($id){
        $ordenesCompra = DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];

        $productos = db::table('ordentrabajo_seguimiento as o')
                        ->join('ordencompra_detalle as d','d.id','o.id_detalle')
                        ->join('productos as pr','pr.id','d.producto')
                        ->where('o.id_orden',$id)
                        ->selectraw('distinct d.id, pr.numero_parte, d.incremento')
                        ->get();
        //dd($productos);
        //$detalle = db::table('')
        $procesos = array();
        $subprocesos = array();
        return view('ordenes_compras.seguimiento',compact('ordenesCompra','productos','procesos','subprocesos'));
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
