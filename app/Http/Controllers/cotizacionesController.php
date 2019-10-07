<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecotizacionesRequest;
use App\Http\Requests\UpdatecotizacionesRequest;
use App\Repositories\cotizacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use Sesion;
use view;

class cotizacionesController extends AppBaseController
{
    /** @var  cotizacionesRepository */
    private $cotizacionesRepository;

    public function __construct(cotizacionesRepository $cotizacionesRepo)
    {
        $this->cotizacionesRepository = $cotizacionesRepo;
    }

    /**
     * Display a listing of the cotizaciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){

        if ($request->session()->has('num_cot')) {
             
         $num_cotizacion = $request->session()->get('num_cot');

         }else{

            $maxcotizacion=DB::table('cotizaciones')
                         ->selectraw('ifnull(max(id),0)+1 as cotizacion_num') 
                         ->get();

            $maxcotizacion = $maxcotizacion[0];
            $request->session()->put('num_cot',$maxcotizacion->cotizacion_num);
      
            $num_cotizacion = $request->session()->get('num_cot');
            $fecha = date('Y-m-d');

            $id = DB::table('cotizaciones')
                    ->insert(['fecha' => $fecha,
                              'cliente'=>0,
                              'id_notas'=>0,
                              'tiempo'=>0,
                              'income'=>0,
                              'termino_pago'=>' ',
                              'vendedor'=>0]);           
         }

        $tipo = 1;
        $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('condiciones as co',function($join)use($tipo){
                                        $join->on('co.id','c.id_notas')
                                            ->where('co.tipo',$tipo);})
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->where('c.id',$num_cotizacion)
                        ->selectraw('c.*, co.condicion as notas')
                        ->get();
        $detalle = DB::table('cotizacion_detalle as c')
                        ->leftjoin('productos as p', 'c.producto','p.id')
                        ->leftjoin('clientes as cl','cl.id','p.id_empresa')
                        ->selectraw('c.*, p.*,nombre_corto ,c.id as idc')
                        ->where('c.id_cotizacion',$num_cotizacion)
                        ->get();
               
        $cotizacion = $cotizacion[0];

        $clientes = db::table('clientes')->get();
       
       // $dibujos = DB::table('producto_dibujos')->where('id_producto',$cotizacion->producto)->get();
        $condiciones = DB::table('condiciones')->where('tipo',1)->get();
        $income = DB::table('income_terms')->get();
        $productos = DB::table('productos')->get();

        $info_producto  = DB::select('SELECT p.tiempo_entrega, sumahora, p.peso, p.costo_material, p.costo_produccion, f.familia AS nfamilia,dibujo_nombre, revision
                                      FROM cotizacion_detalle cd
                                      inner join productos p on p.id = cd.producto
                                      LEFT JOIN familias f ON f.id = p.familia 
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = 1)) d ON d.id_producto = p.id
                                      LEFT JOIN (
                                                SELECT SUM(horas) AS sumahora, id_producto
                                                from productos_procesos  p
                                                inner join cotizacion_detalle cd on p.id_producto = cd.producto
                                                INNER JOIN procesos pp ON pp.id = p.id_proceso
                                                WHERE cd.id_cotizacion ='. $num_cotizacion.'
                                                group by p.id_producto) s ON s.id_producto = p.id
                                      where cd.id_cotizacion ='. $num_cotizacion);
          
          #$info_producto = $info_producto[0];


        return view('cotizaciones.index',compact('cotizacion','info_producto','condiciones','income','productos','num_cotizacion','clientes','detalle'));
    }

    /**
     * Show the form for creating a new cotizaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotizaciones.create');
    }

    /**
     * Store a newly created cotizaciones in storage.
     *
     * @param CreatecotizacionesRequest $request
     *
     * @return Response
     */
    public function store(CreatecotizacionesRequest $request)
    {
        $input = $request->all();

        $cotizaciones = $this->cotizacionesRepository->create($input);

        Flash::success('Cotizaciones saved successfully.');

        return redirect(route('cotizaciones.index'));
    }

    /**
     * Display the specified cotizaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotizaciones = $this->cotizacionesRepository->find($id);

        if (empty($cotizaciones)) {
            Flash::error('Cotizaciones not found');

            return redirect(route('cotizaciones.index'));
        }

        return view('cotizaciones.show')->with('cotizaciones', $cotizaciones);
    }

    /**
     * Show the form for editing the specified cotizaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotizaciones = $this->cotizacionesRepository->find($id);

        if (empty($cotizaciones)) {
            Flash::error('Cotizaciones not found');

            return redirect(route('cotizaciones.index'));
        }

        return view('cotizaciones.edit')->with('cotizaciones', $cotizaciones);
    }

    /**
     * Update the specified cotizaciones in storage.
     *
     * @param int $id
     * @param UpdatecotizacionesRequest $request
     *
     * @return Response
     */
    public function guarda_informacion(Request $request){
        $num_cotizacion = $request->session()->get('num_cot');

        DB::table('cotizaciones')
        ->where('id',$num_cotizacion)
        ->update(['income'=>$request->income]);
    }

    /**
     * Remove the specified cotizaciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $cotizaciones = $this->cotizacionesRepository->find($id);

        if (empty($cotizaciones)) {
            Flash::error('Cotizaciones not found');

            return redirect(route('cotizaciones.index'));
        }

        $this->cotizacionesRepository->delete($id);

        Flash::success('Cotizaciones deleted successfully.');

        return redirect(route('cotizaciones.index'));
    }

    function informacion(Request $request){
        $num_cotizacion = $request->session()->get('num_cot');

        DB::update('update cotizaciones as  c
                    inner join productos p on p.id  = '.$request->id_producto.'
                    set cliente = p.id_empresa           
                where  c.id ='. $num_cotizacion);
           
        $productos = DB::table('productos')->get();
        $dibujos = DB::table('producto_dibujos')->where('id_producto',$request->id_producto)->get();
        $condiciones = DB::table('condiciones')->where('tipo',1)->get();
        $income = DB::table('income_terms')->get();

        $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('clientes as cl','cl.id','c.cliente')
                        ->selectraw('c.*, nombre_corto')
                        ->where('c.id',$num_cotizacion)
                        ->get();
        $list_prod = '';

        foreach ($dibujos as $key) {
            $list_prod .= "<option value='".$key->id."'>".$key->dibujo_nombre."</option>";
        }

        $arr = array('cotizacion' => $cotizacion,
                     'dibujos'=>$list_prod);

         return json_encode($arr);

    }

    function informacion_dibujo(Request $request){
        $info = DB::table('producto_dibujos')->where('id',$request->dibujo)->get();
        return json_encode($info[0]->tiempo_entrega);        
    }

    function obtiene_producto(Request $request){

        $num_cotizacion = $request->session()->get('num_cot');

        $cliente = DB::table('cotizaciones')
                ->selectraw('distinct cliente')
                ->get();

        if($cliente != $request->cliente){
            db::table('cotizacion_detalle')
            ->where('id_cotizacion',$num_cotizacion)
            ->delete();
        }
        
        $productos = DB::table('productos')
                    ->where('id_empresa',$request->cliente)
                    ->get();

        return json_encode($productos);
   

    }

    function agrega_producto(Request $request){
        $num_cotizacion = $request->session()->get('num_cot');

        $existe = DB::table('cotizacion_detalle')
                ->where([['id_cotizacion',$num_cotizacion],['producto',$request->producto]])
                ->selectraw('count(*) as existe')
                ->get();

        if($existe[0]->existe > 0){
            return json_encode(1);
        }else{

        $num_cotizacion = $request->session()->get('num_cot');

        $info_producto  = DB::select('SELECT p.descripcion, p.tiempo_entrega,p.id_empresa, p.peso, ifnull(p.costo_material,0) as costo_material, ifnull(p.costo_produccion,0) as costo_produccion, p.costo_material,dibujo_nombre, revision,d.id
                                      FROM productos p
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto,id
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = 1)) d ON d.id_producto = p.id
                                      where p.id ='. $request->producto);
          

          DB::table('cotizacion_detalle')
          ->insert(['id_cotizacion'=>$num_cotizacion,
                    'producto'=>$request->producto,
                    'dibujo'=>$info_producto[0]->id,
                    'cantidad'=>1,
                    'costo'=>$info_producto[0]->costo_produccion,
                    'precio_usd'=>$info_producto[0]->costo_material
                ]);

          db::table('cotizaciones')
          ->where('id',$num_cotizacion)
          ->update(['cliente'=>$info_producto[0]->id_empresa]);

          $detalle = DB::table('cotizacion_detalle as c')
                        ->leftjoin('productos as p', 'c.producto','p.id')
                        ->leftjoin('clientes as cl','cl.id','p.id_empresa')
                        ->selectraw('c.*, p.*,nombre_corto ,c.id as idc')
                        ->where('c.id_cotizacion',$num_cotizacion)
                        ->get();

            $options = view('cotizaciones.detalle',compact('detalle'))->render();    
             return json_encode($options);
         }

    }

    function delete_producto(Request $request){
        $num_cotizacion = $request->session()->get('num_cot');
        DB::table('cotizacion_detalle')
        ->where([['id_cotizacion',$num_cotizacion],['id',$request->id_prod]])
        ->delete();

        $detalle = DB::table('cotizacion_detalle as c')
                        ->leftjoin('productos as p', 'c.producto','p.id')
                        ->leftjoin('clientes as cl','cl.id','p.id_empresa')
                        ->selectraw('c.*, p.*,nombre_corto ,c.id as idc')
                        ->where('c.id_cotizacion',$num_cotizacion)
                        ->get();

        $options = view('cotizaciones.detalle',compact('detalle'))->render();    
         return json_encode($options);

    }

    function actualiza_producto(Request $request){
        $num_cotizacion = $request->session()->get('num_cot');

        DB::table('cotizacion_detalle')
        ->where('id',$request->producto)
        ->update(['cantidad'=>$request->cantidad]);

        $detalle = DB::table('cotizacion_detalle as c')
                        ->leftjoin('productos as p', 'c.producto','p.id')
                        ->leftjoin('clientes as cl','cl.id','p.id_empresa')
                        ->selectraw('c.*, p.*,nombre_corto ,c.id as idc')
                        ->where('c.id_cotizacion',$num_cotizacion)
                        ->get();

        $options = view('cotizaciones.detalle',compact('detalle'))->render();    
         return json_encode($options);

    }
}
