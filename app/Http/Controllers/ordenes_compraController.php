<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createordenes_compraRequest;
use App\Http\Requests\Updateordenes_compraRequest;
use App\Repositories\ordenes_compraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

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
    public function show($id)
    {
        $ordenesCompra = $this->ordenesCompraRepository->find($id);

        if (empty($ordenesCompra)) {
            Flash::error('Ordenes Compra not found');

            return redirect(route('ordenesCompras.index'));
        }

        return view('ordenes_compras.show')->with('ordenesCompra', $ordenesCompra);
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
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_telefono')
                        ->get();
        $ordenesCompra = $ordenesCompra[0];

        $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
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
        $income = DB::table('income_terms')->get();
 

        return view('ordenes_compras.edit',compact('detalle','ordenesCompra','income'));
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
                                      'fecha'=>$cotizacion->fecha]);

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
                          'costo'=>$detalle->costo
                      ]);
        }

        return 1;
    }
}
