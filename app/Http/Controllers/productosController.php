<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproductosRequest;
use App\Http\Requests\UpdateproductosRequest;
use App\Repositories\productosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Flash;
use DB;
use Response;
use View;


class productosController extends AppBaseController
{
    /** @var  productosRepository */
    private $productosRepository;

    public function __construct(productosRepository $productosRepo)
    {
        $this->productosRepository = $productosRepo;
    }

    /**
     * Display a listing of the productos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $productos = DB::table('productos as p')
                        ->leftjoin('familias as f', 'f.id','p.familia')
                        ->leftjoin('clientes as c', 'c.id','p.id_empresa')
                        ->leftjoin('tipoaceros as t', 't.id','p.id_acero')
                        ->leftjoin('tipoestructuras as a', 'a.id','p.id_estructura')
                        ->selectraw('p.*, f.familia, c.nombre_corto, t.acero, a.estructura')
                        ->get();



        return view('productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new productos.
     *
     * @return Response
     */
    public function create(){

        $familias = DB::table('familias')->get();
        $clientes = DB::table('clientes')->get();
        $tipoacero = DB::table('tipoaceros')->get();
        $tipoestructura = DB::table('tipoestructuras')->get();
        $producto_dibujos = array('tiempo_entrega'=>'',
                                    'revision'=>'',
                                    'dibujo'=>'',
                                    'id'=>''
                                    );
        $info_producto = array('');        
        return view('productos.create',compact('familias','clientes','tipoacero','tipoestructura','producto_dibujos','info_producto'));
    }

    /**
     * Store a newly created productos in storage.
     *
     * @param CreateproductosRequest $request
     *
     * @return Response
     */
    public function store(CreateproductosRequest $request)
    {
        $input = $request->all();

        $productos = $this->productosRepository->create($input);

        Flash::success('Productos saved successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productos = $this->productosRepository->find($id);
        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('productos', $productos);
    }

    /**
     * Show the form for editing the specified productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
         $subprocesos = array();
         $opcion = 'nada';
         $producto_dibujos = array('tiempo_entrega'=>'',
                                    'revision'=>'',
                                    'dibujo'=>'',
                                    'id'=>'',
                                    'dibujo_nombre'=>''
                                    );

         $producto_dibujos = (object)$producto_dibujos;

         $productos = DB::table('productos')->where('id',$id)->get();
         $clientes = DB::table('clientes')->get();
         $familias = DB::table('familias')->get();
         $tipoacero = DB::table('tipoaceros')->get();
         $tipoestructura = DB::table('tipoestructuras')->get();
         // $producto_dibujos = DB::table('producto_dibujos')->where('id',$id)->get();
         $productoDibujos = DB::table('producto_dibujos')->where('id_producto',$id)->get();
         $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp',function($join)use($id){
                            $join->on('pp.id_proceso','p.id')
                            ->where('pp.id_producto',$id);})
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado , if(pp.horas > 0, pp.horas,p.horas) as horasp')
                        ->get();

          $materiales = DB::table('materiales as m')
                            ->leftjoin('producto_materiales as pm',function($join)use($id){
                                $join->on('pm.id_material','m.id')
                                ->where('pm.id_producto',$id);})
                            ->selectraw('m.*, if(pm.id_producto>0,1,0) as asignado')
                            ->get();


         $productos = $productos[0];
         $id_producto = $id;

         $info_producto  = DB::select('SELECT p.tiempo_entrega, sumahora, p.peso, p.costo_material, p.costo_produccion, f.familia AS nfamilia,dibujo_nombre, revision
                                      FROM productos p
                                      LEFT JOIN familias f ON f.id = p.familia 
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = 1)) d ON d.id_producto = p.id
                                      LEFT JOIN (
                                                SELECT SUM(if(p.horas > 0, p.horas , pp.horas)) AS sumahora, id_producto
                                                from productos_procesos  p
                                                INNER JOIN procesos pp ON pp.id = p.id_proceso
                                                WHERE p.id_producto = '. $id_producto.'
                                                group by p.id_producto) s ON s.id_producto = p.id
                                      where p.id ='. $id_producto);
          
          $info_producto = $info_producto[0]; 

          $info_proceso = DB::table('productos_procesos as pp') 
                        ->leftjoin('procesos as p','p.id','pp.id_proceso' )
                         ->where('id_producto',$id_producto)  
                         ->selectraw('p.*')
                         ->get();   

          $info_material = DB::table('producto_materiales as pm') 
                          ->join('materiales as m','m.id','pm.id_material')
                         ->where('id_producto',$id_producto)  
                         ->get(); 

                       
        $info_pro = '';
        $info_mat = '';
         foreach ($info_proceso as $pro) {
            $info_pro .= '<span class="badge badge-pill badge-primary">'.$pro->procesos.'</span>&nbsp;';  
         }

         foreach ($info_material as $mate) {
            $info_mat .= '<span class="badge badge-pill badge-primary">'.$mate->material.'</span>&nbsp;';  
         }

        return view('productos.edit',compact('productos','info_mat','info_pro','opcion','procesos','materiales', 'producto_dibujos','familias','clientes','tipoacero','tipoestructura','productoDibujos','procesos','id_producto','subprocesos','materiales','info_producto'));
    }

    /**
     * Update the specified productos in storage.
     *
     * @param int $id
     * @param UpdateproductosRequest $request
     *
     * @return Response 
     */
    public function update($id, UpdateproductosRequest $request)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        $productos = $this->productosRepository->update($request->all(), $id);

        Flash::success('Productos updated successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified productos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        DB::table('productos')->delete($id);

        Flash::success('Productos deleted successfully.');

        return redirect(route('productos.index'));
    }

    function agrega_proceso(Request $request){

        $existe = DB::table('productos_procesos')
                    ->selectraw('count(*) as existe')
                    ->where([['id_proceso',$request->id_proceso],['id_producto',$request->id_producto]])
                    ->get();
        if($existe[0]->existe >0 ){
            return 1;
        }else{
            DB::table('productos_procesos')
                ->insert(['id_producto'=>$request->id_producto,
                          'id_proceso'=>$request->id_proceso,
                          'horas'=>$request->horas]);
            $id = $request->id_producto;
            $procesos = DB::table('procesos as p')
                            ->leftjoin('productos_procesos as pp',function($join)use($id){
                                $join->on('pp.id_proceso','p.id')
                                ->where('pp.id_producto',$id);})
                            ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado, if(p.horas > 0, p.horas , pp.horas) as horasp')
                            ->get();
            $subprocesos = DB::table('subprocesos as p')
                               ->leftjoin('productos_subprocesos as s',function($join)use($id){
                                $join->on('s.id_subproceso','p.id')
                                ->where('s.id_producto',$id);}) 
                                ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                                ->where('p.idproceso',$request->id_proceso)
                                ->get();

            $id_producto = $request->id_producto;

            $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    

            $info_producto  = DB::select('SELECT p.tiempo_entrega, sumahora, p.peso, p.costo_material, p.costo_produccion, f.familia AS nfamilia,dibujo_nombre, revision
                                      FROM productos p
                                      LEFT JOIN familias f ON f.id = p.familia 
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = 1)) d ON d.id_producto = p.id
                                      LEFT JOIN (
                                                SELECT SUM(if(p.horas > 0, p.horas , pp.horas)) AS sumahora, id_producto
                                                from productos_procesos  p
                                                INNER JOIN procesos pp ON pp.id = p.id_proceso
                                                WHERE p.id_producto = '. $id_producto.'
                                                group by p.id_producto) s ON s.id_producto = p.id
                                      where p.id ='. $id_producto);
          
          $info_producto = $info_producto[0];   

          $info_proceso = DB::table('productos_procesos as pp') 
                        ->leftjoin('procesos as p','p.id','pp.id_proceso' )
                         ->where('id_producto',$id_producto)  
                         ->selectraw('p.*')
                         ->get();   

          $info_material = DB::table('producto_materiales as pm') 
                          ->join('materiales as m','m.id','pm.id_material')
                         ->where('id_producto',$id_producto)  
                         ->get(); 

                       
        $info_pro = '';
        $info_mat = '';
         foreach ($info_proceso as $pro) {
            $info_pro .= '<span class="badge badge-pill badge-primary">'.$pro->procesos.'</span>&nbsp;';  
         }

         foreach ($info_material as $mate) {
            $info_mat .= '<span class="badge badge-pill badge-primary">'.$mate->material.'</span>&nbsp;';  
         }

         $costeo = view('productos.costeo',compact('info_mat','info_pro','info_producto'))->render();    

         $array  = array('costeo' => $costeo , 
                        'options' => $options);

            return json_encode($array);
        }

    }
    

    function show_proceso(Request $request){
        $id = $request->id_producto;
        $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp',function($join)use($id){
                            $join->on('pp.id_proceso','p.id')
                            ->where('pp.id_producto',$id);})
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado , if(p.horas > 0, p.horas , pp.horas) as horasp')
                        ->get();
        $subprocesos = DB::table('subprocesos as p')
                           ->leftjoin('productos_subprocesos as s',function($join)use($id){
                                $join->on('s.id_subproceso','p.id')
                                ->where('s.id_producto',$id);}) 
                            ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                            ->where('p.idproceso',$request->id_proceso)
                            ->get();

        $id_producto = $request->id_producto;
        $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    
        return json_encode($options);
    }    

    function quitar_proceso(Request $request){
        // $wherearray= array('id_producto' => $request->id_producto, 'id_proceso' => $request->id_proceso);

        DB::update('delete from productos_procesos where id_producto = '.$request->id_producto .' and id_proceso = '. $request->id_proceso);
        DB::update('delete from productos_subprocesos where id_producto = '.$request->id_producto .' and id_proceso = '. $request->id_proceso);

        $id = $request->id_producto;

        $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp',function($join)use($id){
                            $join->on('pp.id_proceso','p.id')
                            ->where('pp.id_producto',$id);})
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado , if(pp.horas > 0, pp.horas,p.horas) as horasp')
                        ->get();
        $subprocesos = DB::table('subprocesos as p')
                           ->leftjoin('productos_subprocesos as s',function($join)use($id){
                                $join->on('s.id_subproceso','p.id')
                                ->where('s.id_producto',$id);}) 
                            ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                            ->where('p.idproceso',$request->id_proceso)
                            ->get();
        //dd($subprocesos);
        $id_producto = $request->id_producto;
        $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    

        $info_producto  = DB::select('SELECT p.tiempo_entrega, sumahora, p.peso, p.costo_material, p.costo_produccion, f.familia AS nfamilia,dibujo_nombre, revision
                                      FROM productos p
                                      LEFT JOIN familias f ON f.id = p.familia 
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = 1)) d ON d.id_producto = p.id
                                      LEFT JOIN (
                                                SELECT SUM(if(p.horas > 0, p.horas , pp.horas)) AS sumahora, id_producto
                                                from productos_procesos  p
                                                INNER JOIN procesos pp ON pp.id = p.id_proceso
                                                WHERE p.id_producto = '. $id_producto.'
                                                group by p.id_producto) s ON s.id_producto = p.id
                                      where p.id ='. $id_producto);
          
          $info_producto = $info_producto[0];   

          $info_proceso = DB::table('productos_procesos as pp') 
                        ->leftjoin('procesos as p','p.id','pp.id_proceso' )
                         ->where('id_producto',$id_producto)  
                         ->selectraw('p.*')
                         ->get();   

          $info_material = DB::table('producto_materiales as pm') 
                          ->join('materiales as m','m.id','pm.id_material')
                         ->where('id_producto',$id_producto)  
                         ->get(); 

                       
        $info_pro = '';
        $info_mat = '';
         foreach ($info_proceso as $pro) {
            $info_pro .= '<span class="badge badge-pill badge-primary">'.$pro->procesos.'</span>&nbsp;';  
         }

         foreach ($info_material as $mate) {
            $info_mat .= '<span class="badge badge-pill badge-primary">'.$mate->material.'</span>&nbsp;';  
         }

         $costeo = view('productos.costeo',compact('info_mat','info_pro','info_producto'))->render();    

         $array  = array('costeo' => $costeo , 
                        'options' => $options);

        return json_encode($array);
    }    

    function agrega_subproceso(Request $request){
        $existe = DB::table('productos_procesos')
                    ->selectraw('ifnull(count(*),0)  as existe')
                    ->where([['id_proceso',$request->id_proceso],['id_producto',$request->id_producto]])
                    ->get();
        //return json_encode($existe[0]->existe);
        if($existe[0]->existe == 0 ){
            return 1;
        }else{
            DB::table('productos_subprocesos')
                ->insert(['id_producto'=>$request->id_producto,
                          'id_subproceso'=>$request->id_subproceso,
                          'id_proceso'=>$request->id_proceso]);

            $id = $request->id_producto;
            $procesos = DB::table('procesos as p')
                            ->leftjoin('productos_procesos as pp',function($join)use($id){
                                $join->on('pp.id_proceso','p.id')
                                ->where('pp.id_producto',$id);})
                            ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado, if(p.horas > 0, p.horas , pp.horas) as horasp')
                            ->get();
            $subprocesos = DB::table('subprocesos as p')
                               ->leftjoin('productos_subprocesos as s',function($join)use($id){
                                    $join->on('s.id_subproceso','p.id')
                                    ->where('s.id_producto',$id);}) 
                                ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                                ->where('p.idproceso',$request->id_proceso)
                                ->get();

            $id_producto = $request->id_producto;
            $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    
            return json_encode($options);
        }
    }

    function quitar_subproceso(Request $request){
        #DB::update('delete from productos_procesos where id_producto = '.$request->id_producto .' and id_proceso = '. $request->id_proceso);
        DB::update('delete from productos_subprocesos where id_producto = '.$request->id_producto .' and id_subproceso = '. $request->id_subproceso);

        $id = $request->id_producto;
        $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp',function($join)use($id){
                            $join->on('pp.id_proceso','p.id')
                            ->where('pp.id_producto',$id);})
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado , if(pp.horas > 0, pp.horas,p.horas) as horasp')
                        ->get();
        $subprocesos = DB::table('subprocesos as p')
                           ->leftjoin('productos_subprocesos as s',function($join)use($id){
                                $join->on('s.id_subproceso','p.id')
                                ->where('s.id_producto',$id);}) 
                            ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                            ->where('p.idproceso',$request->id_proceso)
                            ->get();
        //dd($subprocesos);
        $id_producto = $request->id_producto;
        $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    
        return json_encode($options);
    }

    function subir_imagen(){
         $url = "/storage/dibujos/VZyUm23iiVPuQb4rdXAGO9xoeV5vNso2Zz11GtSR.png";

        #$contents = Storage::get('gB3EnXcMdVQP4V1RFlT64EpdgqFXc3uqyooUOVTv.png');
        $contents = '';
        return view('productos.uploadFile',compact('contents','url'));
    }
    
    
    function action(Request $request){

        $file_img = $request->file('select_file');
        $img = Storage::url($file_img->store('dibujos', 'public'));
        $imgp = strpos($img,'/storage/');
        $img = substr($img, $imgp, strlen($img));
        
        $fecha = date("Y-m-d");
        DB::table('producto_dibujos')
                ->insert(['id_producto'=>$request->idproducto,
                          'dibujo'=>$img,
                          'fecha'=>$fecha,
                          'revision'=>$request->revision,
                          'tiempo_entrega'=>$request->tiempoentrega,
                          'dibujo_nombre'=>$request->dibujo_nombre ]);

        return redirect('productos/'.$request->idproducto.'/edit');
    }

    function show_dibujo(Request $request){
        $url = $request->dibujo;
        $options = view('productos.show',compact('url'))->render();   
        return json_encode($options); 
    }

    function nuevo_dibujo(Request $request){
        $opcion = 'nuevo';
        $productos = DB::table('productos')->where('id',$request->id_producto)->get();
         $producto_dibujos = array('tiempo_entrega'=>'',
                                    'revision'=>'',
                                    'dibujo'=>'',
                                    'dibujo_nombre'=>'',
                                    'id'=>''
                                    );

         $producto_dibujos = (object)$producto_dibujos;
         $productos = $productos[0];
         $options = view('productos.uploadFile',compact('productos','producto_dibujos','opcion'))->render();   
         return json_encode($options); 
    }

    function editar_dibujo(Request $request){
        $opcion = 'editar';
        $productos = DB::table('productos')->where('id',$request->id_producto)->get();
        $productos = $productos[0];
        $producto_dibujos = DB::table('producto_dibujos')->where('id',$request->id_dibujo)->get();
        $producto_dibujos = $producto_dibujos[0];
        //$producto_dibujos =$request->id_dibujo;
        $options = view('productos.uploadFile',compact('productos','producto_dibujos','opcion'))->render();   
        
        return json_encode($options); 
    }

    function actualiza(Request $request){
        $file_img = $request->file('select_file');
        if(!empty($file_img)){
            $img = Storage::url($file_img->store('dibujos', 'public'));
            $imgp = strpos($img,'/storage/');
            $img = substr($img, $imgp, strlen($img));
            
            DB::table('producto_dibujos')
                ->where('id',$request->iddibujo)
                ->update(['dibujo'=>$img]);

        }

        $fecha = date("Y-m-d");
        DB::table('producto_dibujos')
                ->where('id',$request->iddibujo)
                ->update(['fecha'=>$fecha,
                          'revision'=>$request->revision,
                          'tiempo_entrega'=>$request->tiempoentrega,
                          'dibujo_nombre'=>$request->dibujo_nombre ]);

        return redirect('productos/'.$request->idproducto.'/edit');
    }

    function elimina_dibujo(Request $request){
        DB::table('producto_dibujos')->where('id',$request->id_dibujo)->delete();
        $productoDibujos = DB::table('producto_dibujos')->where('id_producto',$request->id_producto)->get();
        $options = view('producto_dibujos.table',compact('productoDibujos'))->render(); 

        return json_encode($options);
    }

    function agrega_material(Request $request){
      $existe = DB::table('producto_materiales')
                    ->selectraw('count(*) as existe')
                    ->where([['id_material',$request->id_material],
                            ['id_producto',$request->id_producto]])
                    ->get();

        if($existe[0]->existe >0 ){
            return 1; 
        }else{
            DB::table('producto_materiales')
                ->insert(['id_producto'=>$request->id_producto,
                          'id_material'=>$request->id_material]);

             $materiales = DB::table('materiales as m')
                          ->leftjoin('producto_materiales as pm','pm.id_material','m.id')
                          ->selectraw('m.*, if(pm.id_producto>0,1,0) as asignado')
                          ->get();
            $id_producto = $request->id_producto;
            $options = view('productos.productos_materiales',compact('materiales','id_producto'))->render();    

            $info_producto  = DB::select('SELECT p.tiempo_entrega, sumahora, p.peso, p.costo_material, p.costo_produccion, f.familia AS nfamilia,dibujo_nombre, revision
                                      FROM productos p
                                      LEFT JOIN familias f ON f.id = p.familia 
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = 1)) d ON d.id_producto = p.id
                                      LEFT JOIN (
                                                SELECT SUM(if(p.horas > 0, p.horas , pp.horas)) AS sumahora, id_producto
                                                from productos_procesos  p
                                                INNER JOIN procesos pp ON pp.id = p.id_proceso
                                                WHERE p.id_producto = '. $id_producto.'
                                                group by p.id_producto) s ON s.id_producto = p.id
                                      where p.id ='. $id_producto);
          
          $info_producto = $info_producto[0];   

          $info_proceso = DB::table('productos_procesos as pp') 
                        ->leftjoin('procesos as p','p.id','pp.id_proceso' )
                         ->where('id_producto',$id_producto)  
                         ->selectraw('p.*')
                         ->get();   

          $info_material = DB::table('producto_materiales as pm') 
                          ->join('materiales as m','m.id','pm.id_material')
                         ->where('id_producto',$id_producto)  
                         ->get(); 

                           
            $info_pro = '';
            $info_mat = '';
             foreach ($info_proceso as $pro) {
                $info_pro .= '<span class="badge badge-pill badge-primary">'.$pro->procesos.'</span>&nbsp;';  
             }

             foreach ($info_material as $mate) {
                $info_mat .= '<span class="badge badge-pill badge-primary">'.$mate->material.'</span>&nbsp;';  
             }

             $costeo = view('productos.costeo',compact('info_mat','info_pro','info_producto'))->render();    

             $array  = array('costeo' => $costeo , 
                            'options' => $options);
             
            return json_encode($array);

            #return json_encode($options);
        }
    }

    function quitar_material(Request $request){
      DB::table('producto_materiales')
      ->where([['id_material',$request->id_material],
                            ['id_producto',$request->id_producto]])
      ->delete();
      $materiales = DB::table('materiales as m')
                          ->leftjoin('producto_materiales as pm','pm.id_material','m.id')
                          ->selectraw('m.*, if(pm.id_producto>0,1,0) as asignado')
                          ->get();
                          
      $id_producto = $request->id_producto;
      $options = view('productos.productos_materiales',compact('materiales','id_producto'))->render();  

       $info_producto  = DB::select('SELECT p.tiempo_entrega, sumahora, p.peso, p.costo_material, p.costo_produccion, f.familia AS nfamilia,dibujo_nombre, revision
                                      FROM productos p
                                      LEFT JOIN familias f ON f.id = p.familia 
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = 1)) d ON d.id_producto = p.id
                                      LEFT JOIN (
                                                SELECT SUM(if(p.horas > 0, p.horas , pp.horas)) AS sumahora, id_producto
                                                from productos_procesos  p
                                                INNER JOIN procesos pp ON pp.id = p.id_proceso
                                                WHERE p.id_producto = '. $id_producto.'
                                                group by p.id_producto) s ON s.id_producto = p.id
                                      where p.id ='. $id_producto);
          
          $info_producto = $info_producto[0];   

          $info_proceso = DB::table('productos_procesos as pp') 
                        ->leftjoin('procesos as p','p.id','pp.id_proceso' )
                         ->where('id_producto',$id_producto)  
                         ->selectraw('p.*')
                         ->get();   

          $info_material = DB::table('producto_materiales as pm') 
                          ->join('materiales as m','m.id','pm.id_material')
                         ->where('id_producto',$id_producto)  
                         ->get(); 

                           
            $info_pro = '';
            $info_mat = '';
             foreach ($info_proceso as $pro) {
                $info_pro .= '<span class="badge badge-pill badge-primary">'.$pro->procesos.'</span>&nbsp;';  
             }

             foreach ($info_material as $mate) {
                $info_mat .= '<span class="badge badge-pill badge-primary">'.$mate->material.'</span>&nbsp;';  
             }

             $costeo = view('productos.costeo',compact('info_mat','info_pro','info_producto'))->render();    

             $array  = array('costeo' => $costeo , 
                            'options' => $options);
             
            return json_encode($array);  


      #return json_encode($options);

    }

    function actualiza_proceso(Request $request){
            DB::table('productos_procesos')
                ->where([['id_proceso',$request->id_proceso],['id_producto',$request->id_producto]])
                ->update(['horas'=>$request->horas]);

            $id_producto = $request->id_producto;
            $info_producto  = DB::select('SELECT p.tiempo_entrega, sumahora, p.peso, p.costo_material, p.costo_produccion, f.familia AS nfamilia,dibujo_nombre, revision
                                      FROM productos p
                                      LEFT JOIN familias f ON f.id = p.familia 
                                      LEFT JOIN (
                                             SELECT dibujo_nombre, revision, id_producto
                                             FROM producto_dibujos
                                             WHERE id IN (SELECT MAX(id)  FROM producto_dibujos WHERE id_producto = 1)) d ON d.id_producto = p.id
                                      LEFT JOIN (
                                                SELECT SUM(if(p.horas > 0, p.horas , pp.horas)) AS sumahora, id_producto
                                                from productos_procesos  p
                                                INNER JOIN procesos pp ON pp.id = p.id_proceso
                                                WHERE p.id_producto = '. $id_producto.'
                                                group by p.id_producto) s ON s.id_producto = p.id
                                      where p.id ='. $id_producto);
          
          $info_producto = $info_producto[0];   

          $info_proceso = DB::table('productos_procesos as pp') 
                        ->leftjoin('procesos as p','p.id','pp.id_proceso' )
                         ->where('id_producto',$id_producto)  
                         ->selectraw('p.*')
                         ->get();   

          $info_material = DB::table('producto_materiales as pm') 
                          ->join('materiales as m','m.id','pm.id_material')
                         ->where('id_producto',$id_producto)  
                         ->get(); 

                           
            $info_pro = '';
            $info_mat = '';
             foreach ($info_proceso as $pro) {
                $info_pro .= '<span class="badge badge-pill badge-primary">'.$pro->procesos.'</span>&nbsp;';  
             }

             foreach ($info_material as $mate) {
                $info_mat .= '<span class="badge badge-pill badge-primary">'.$mate->material.'</span>&nbsp;';  
             }

             $subprocesos = DB::table('subprocesos as p')
                           ->leftjoin('productos_subprocesos as s',function($join)use($id_producto){
                                $join->on('s.id_subproceso','p.id')
                                ->where('s.id_producto',$id_producto);}) 
                            ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                            ->where('p.idproceso',$request->id_proceso)
                            ->get();

             $procesos = DB::table('procesos as p')
                            ->leftjoin('productos_procesos as pp',function($join)use($id_producto){
                                $join->on('pp.id_proceso','p.id')
                                ->where('pp.id_producto',$id_producto);})
                            ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado, if(pp.horas > 0, pp.horas,p.horas) as horasp')
                            ->get();
             $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    

             $costeo = view('productos.costeo',compact('info_mat','info_pro','info_producto'))->render();    

             $array  = array('costeo' => $costeo , 
                            'options' => $options);
             
            return json_encode($array);
    }


}