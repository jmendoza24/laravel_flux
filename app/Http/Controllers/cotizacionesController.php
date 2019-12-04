<?php

namespace App\Http\Controllers;

use App\Models\cotizaciones;

use App\Mail\EnvioFlux;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CreatecotizacionesRequest;
use App\Http\Requests\UpdatecotizacionesRequest;
use App\Repositories\cotizacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use Sesion;
use view;
use PDF;

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
            $fecha = date('Y-m-d');

            $id = DB::table('cotizaciones')
                    ->insertGetId(['fecha' => $fecha,
                              'cliente'=>0,
                              'tiempo'=>0,
                              'income'=>0,
                              'termino_pago'=>0,
                              'vendedor'=>auth()->id()]);       
            $request->session()->put('num_cot',$id);
            $num_cotizacion = $request->session()->get('num_cot');

         }


        $tipo = 1;
        $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente') 
                        ->where('c.id',$num_cotizacion)
                        ->selectraw('c.*, nombre_corto,id_proveedor , correo_compra, compra_nombre,compra_telefono')
                        ->get();

        $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre, d.dibujo
                               from cotizacion_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre, p.dibujo
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join cotizacion_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_cotizacion = '.$num_cotizacion.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_cotizacion = '.$num_cotizacion);
     # dd($cotizacion);
        $cotizacion = $cotizacion[0];

        $clientes = db::table('clientes')->get();
       
       // $dibujos = DB::table('producto_dibujos')->where('id_producto',$cotizacion->producto)->get();
        $condiciones = DB::table('condiciones')->where('tipo',1)->get();
        $income = DB::table('income_terms')->get();
        $productos = DB::table('productos')->where('id_empresa',$cotizacion->cliente)->get();      


        return view('cotizaciones.index',compact('cotizacion','condiciones','income','productos','num_cotizacion','clientes','detalle'));
    }

    function historia(Request $request){
        $cotizaciones = db::table('cotizaciones as c')
                        ->leftjoin('users as u','u.id','c.vendedor')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->leftjoin('ordenes_compras as o','o.id_cotizacion','c.id')
                        ->selectraw('c.*, ifnull(o.id,0) as idot, name, cl.nombre_corto, cl.compra_nombre, cl.correo_compra')
                        ->where('enviado','>',0)
                        ->get();

        return view('cotizaciones.create',compact('cotizaciones'));
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
    public function show($id){
        $num_cotizacion = $id;

        $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->leftjoin('estados as e', 'e.id', 'cl.estado')
                        //->leftjoin('tbl_municipios as m','m.id','cl.municipio')
                        ->leftjoin('users as u','u.id','c.vendedor')
                        ->where('c.id',$num_cotizacion)
                        ->selectraw("c.*, u.name, nombre_corto,id_proveedor , correo_compra,compra_nombre, compra_telefono, concat(cl.calle, ' ', cl.numero ,', ', cl.municipio,', ', e.estado) as direccion")
                        ->get();
        $cotizacion = $cotizacion[0];

        $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from cotizacion_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join cotizacion_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_cotizacion = '.$num_cotizacion.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_cotizacion = '.$num_cotizacion);
        $envio = 0;

        return view('cotizaciones.show',compact('cotizacion','detalle','envio'));
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
                    ->where('id',$num_cotizacion)
                    ->get();

        if($cliente[0]->cliente != $request->cliente){
            db::table('cotizacion_detalle')
            ->where('id_cotizacion',$num_cotizacion)
            ->delete();
        }
        
        $productos = DB::table('productos')
                    ->where('id_empresa',$request->cliente)
                    ->get();
        $prod = '<option value="">Seleccione una opcion</option>';
        foreach ($productos as $p) {
            $prod .= '<option value="'.$p->id.'">'.$p->numero_parte.'</option>';
        }
        $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from cotizacion_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join cotizacion_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_cotizacion = '.$num_cotizacion.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_cotizacion = '.$num_cotizacion);

        $options = view('cotizaciones.detalle',compact('detalle'))->render();

        $clientes = DB::table('clientes')->where('id',$request->cliente)->get();
        $arrayName = array('productos' => $prod , 
                            'clientes'=>$clientes,
                            'options'=>$options);

        return json_encode($arrayName);
   

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

        $info_producto  = DB::select('SELECT p.descripcion, p.tiempo_entrega,p.id_empresa, p.peso, ifnull(p.costo_material,0) as costo_material, ifnull(p.costo_produccion,0) as costo_produccion, p.costo_material,dibujo_nombre, revision,ifnull(d.id,0) as id
                                      FROM productos p
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto,id
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = '.$request->producto.')) d ON d.id_producto = p.id
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

          $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from cotizacion_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join cotizacion_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_cotizacion = '.$num_cotizacion.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_cotizacion = '.$num_cotizacion);

            $options = view('cotizaciones.detalle',compact('detalle'))->render();    
            $clientes = DB::table('clientes')->where('id',$info_producto[0]->id_empresa)->get();

            $arrayName = array('options' => $options,
                                'clientes'=>$clientes );
             return json_encode($arrayName);
         }

    }

    function delete_producto(Request $request){
        $num_cotizacion = $request->session()->get('num_cot');
        DB::table('cotizacion_detalle')
        ->where([['id_cotizacion',$num_cotizacion],['id',$request->id_prod]])
        ->delete();

        $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from cotizacion_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join cotizacion_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_cotizacion = '.$num_cotizacion.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_cotizacion = '.$num_cotizacion);

        $options = view('cotizaciones.detalle',compact('detalle'))->render();    
         return json_encode($options);

    }

    function actualiza_producto(Request $request){
        $num_cotizacion = $request->session()->get('num_cot');

        DB::table('cotizacion_detalle')
        ->where('id',$request->producto)
        ->update(['cantidad'=>$request->cantidad]);

        $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from cotizacion_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join cotizacion_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_cotizacion = '.$num_cotizacion.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_cotizacion = '.$num_cotizacion);

        $options = view('cotizaciones.detalle',compact('detalle'))->render();    
         return json_encode($options);

    }

    function enviar_cotizacion(Request $request){
        $num_cotizacion = $request->session()->get('num_cot');

        $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->leftjoin('estados as e', 'e.id', 'cl.estado')
                        //->leftjoin('tbl_municipios as m','m.id','cl.municipio')
                        ->leftjoin('users as u','u.id','c.vendedor')
                        ->where('c.id',$num_cotizacion)
                        ->selectraw("c.*, ic.descripcion as descinco, ic.income as descripcionic, u.name, cl.nombre as nombre_corto,id_proveedor , correo_compra, compra_telefono, concat(cl.calle, ' ', cl.numero ,', ', cl.municipio,', ', e.estado) as direccion")
                        ->get();
        $cotizacion = $cotizacion[0];

        $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from cotizacion_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join cotizacion_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_cotizacion = '.$num_cotizacion.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_cotizacion = '.$num_cotizacion);
         
         db::table('cotizaciones')
                ->where('id',$num_cotizacion)
                ->update(['enviado'=>1]);

         $envio = 1;
         $pdf = \PDF::loadView('cotizaciones.cotizacion_envio',compact('cotizacion','detalle','envio'))->setPaper('A4-L','landscape');
         Storage::put('Cotizacion_'.$num_cotizacion.'.pdf', $pdf->output());
        
        $content = "Hola esto es una prueba";

        $subjects = "Ventas Fluxmetals";
        $to = "jacob.mendozaha@gmail.com";

        #$to = $cotizacion->correo_compra;
        $copia = 'salvador@altermedia.mx';
        // here we add attachment, attachment must be an array
        $attachment = [ 
         Storage::url('Cotizacion_'.$num_cotizacion.'.pdf'),
         ];


        Mail::to($to)->cc($copia)->send(new EnvioFlux($subjects, $content,$attachment));
        Storage::delete('Cotizacion_'.$num_cotizacion.'.pdf');
        $request->session()->forget('num_cot');

        return redirect('/historiaCotizacion');
         
        # $pdf->save('Cotizacion_'.$num_cotizacion.'.pdf');
                 
       //$request->session()->forget('num_cot');

    }

    function guarda_informacion_cot(Request $request){
        db::table('cotizaciones')
        ->where('id',$request->cotizacion)
        ->update(['id_notas'=>$request->notas,
                  'income'=>$request->income,
                  'lugar'=>$request->lugar]);
    }

    function elimina_cotizacion(Request $request){
        db::table('cotizaciones')
        ->where('id',$request->id)
        ->delete();

        db::table('cotizacion_detalle')
        ->where('id_cotizacion',$request->id)
        ->delete();

        $cotizaciones = db::table('cotizaciones as c')
                        ->leftjoin('users as u','u.id','c.vendedor')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->leftjoin('ordenes_compras as o','o.id_cotizacion','c.id')
                        ->selectraw('c.*, ifnull(o.id,0) as idot, name, cl.nombre_corto, cl.compra_nombre, cl.correo_compra')
                        ->where('enviado','>',0)
                        ->get();

        $options =  view('cotizaciones.table',compact('cotizaciones'))->render();

        return json_encode($options);
    }

    function detalle_cotizacion(Request $request){
        $num_cotizacion = $request->id_cotizacion;
        $envio = 2;
        $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->leftjoin('estados as e', 'e.id', 'cl.estado')
                        ->leftjoin('users as u','u.id','c.vendedor')
                        ->where('c.id',$num_cotizacion)
                        ->selectraw("c.*, ic.descripcion as descinco, ic.income as descripcionic ,u.name, cl.nombre as nombre_corto,id_proveedor , correo_compra, compra_telefono, concat(cl.calle, ' ', cl.numero ,', ', cl.municipio,', ', e.estado) as direccion")
                        ->get();
        $cotizacion = $cotizacion[0];


        $detalle = db::select('select c.*, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from cotizacion_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join cotizacion_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_cotizacion = '.$num_cotizacion.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                where c.id_cotizacion = '.$num_cotizacion);

        $options = View('cotizaciones.cotizacion_envio',compact('cotizacion','detalle','envio'))->render();
        return json_encode($options);
    }

    function guardar_cotizacion(Request $request){
         $request->session()->forget('num_cot');
         return redirect('historiaCotizacion');
    }

    function revive_cotizacion(Request $request){
        $request->session()->put('num_cot',$request->id);
        return 1;
    }

    function get_costo_plaza(Request $request){
        $cotizacion = new cotizaciones;
        $cotizacion->id_producto = $request->id_producto;
        $plantascosto = $cotizacion->informacion_plaza($cotizacion);
        
        $vista = View('cotizaciones.costo_plantas',compact('plantascosto'))->render();
        return json_encode($vista);
    }

    function envio_mail(){
        $content = "Hola esto es una prueba";

        $subjects = "Ventas Fluxmetals";
        $to = "jacob.mendozaha@gmail.com";
        $copia = '';
        // here we add attachment, attachment must be an array
        $attachment = [ 
         public_path("Cotizacion_72.pdf"),
        //  public_path("dibujos/dOHLxUKLd7TCLMyUCvLSRHbLwEIdRy357Bttl4RO.png"),
         ];


        
        Mail::to($to)->cc($copia)->send(new EnvioFlux($subjects, $content,$attachment));
        /* try {

            return response()->json("Email Sent!");
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }*/
/**
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
        $objDemo->attachment = 'storage/app/public/1JuFx4gwoxn3VeHhQ0nZgoCfnYhTuSoJcZw6VXBO.pdf';
 
        Mail::to("jacob.mendozaha@gmail.com")->send(new EnvioFlux($objDemo));*/
    }

}
