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
        return view('productos.create',compact('familias','clientes','tipoacero','tipoestructura','producto_dibujos'));
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
                                    'id'=>''
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
                        ->leftjoin('productos_procesos as pp','pp.id_proceso','p.id','pp.id_producto',$id)
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado')
                        ->get();

         $productos = $productos[0];
         $id_producto = $id;

        return view('productos.edit',compact('productos','opcion', 'producto_dibujos','familias','clientes','tipoacero','tipoestructura','productoDibujos','procesos','id_producto','subprocesos'));
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
                    ->where('id_proceso',$request->id_proceso)
                    ->get();
        if($existe[0]->existe >0 ){
            return 1;
        }else{
            DB::table('productos_procesos')
                ->insert(['id_producto'=>$request->id_producto,
                          'id_proceso'=>$request->id_proceso]);
            $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp','pp.id_proceso','p.id','pp.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado')
                        ->get(); 
            $subprocesos = DB::table('subprocesos as p')
                        ->leftjoin('productos_subprocesos as s','p.id','s.id_subproceso','s.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                        ->where('p.idproceso',$request->id_proceso)
                        ->get();

            $id_producto = $request->id_producto;
            $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    
            return json_encode($options);
        }

    }
    

    function show_proceso(Request $request){
        $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp','pp.id_proceso','p.id','pp.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado')
                        ->get();

        $subprocesos = DB::table('subprocesos as p')
                        ->leftjoin('productos_subprocesos as s','p.id','s.id_subproceso','s.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                        ->where('p.idproceso',$request->id_proceso)
                        ->get();
        //dd($subprocesos);
        $id_producto = $request->id_producto;
        $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    
        return json_encode($options);
    }    

    function quitar_proceso(Request $request){
        // $wherearray= array('id_producto' => $request->id_producto, 'id_proceso' => $request->id_proceso);

        DB::update('delete from productos_procesos where id_producto = '.$request->id_producto .' and id_proceso = '. $request->id_proceso);
        DB::update('delete from productos_subprocesos where id_producto = '.$request->id_producto .' and id_proceso = '. $request->id_proceso);

        $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp','pp.id_proceso','p.id','pp.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado')
                        ->get();

        $subprocesos = DB::table('subprocesos as p')
                        ->leftjoin('productos_subprocesos as s','p.id','s.id_subproceso','s.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(s.id_producto>0,1,0) as asignado')
                        ->where('p.idproceso',$request->id_proceso)
                        ->get();
        //dd($subprocesos);
        $id_producto = $request->id_producto;
        $options = view('productos.productos_procesos',compact('procesos','id_producto','subprocesos'))->render();    
        return json_encode($options);
    }    

    function agrega_subproceso(Request $request){
        $existe = DB::table('productos_subprocesos')
                    ->selectraw('count(*) as existe')
                    ->where('id_subproceso',$request->id_subproceso)
                    ->get();
        if($existe[0]->existe >0 ){
            return 1;
        }else{
            DB::table('productos_subprocesos')
                ->insert(['id_producto'=>$request->id_producto,
                          'id_subproceso'=>$request->id_subproceso,
                          'id_proceso'=>$request->id_proceso]);

            $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp','pp.id_proceso','p.id','pp.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado')
                        ->get(); 
            $subprocesos = DB::table('subprocesos as p')
                        ->leftjoin('productos_subprocesos as s','p.id','s.id_subproceso','s.id_producto',$request->id_producto)
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

        $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp','pp.id_proceso','p.id','pp.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado')
                        ->get();

        $subprocesos = DB::table('subprocesos as p')
                        ->leftjoin('productos_subprocesos as s','p.id','s.id_subproceso','s.id_producto',$request->id_producto)
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
                          'tiempo_entrega'=>$request->tiempoentrega ]);

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
        $producto_dibujos = DB::table('producto_dibujos')->where('id',$request->id_dibujo)->get();
        $producto_dibujos = $producto_dibujos[0];
        //$producto_dibujos =$request->id_dibujo;
        $options = view('productos.uploadFile',compact('productos','producto_dibujos','opcion'))->render();   
        
        return json_encode($options); 
    }



}