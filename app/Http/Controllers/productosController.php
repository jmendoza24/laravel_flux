<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproductosRequest;
use App\Http\Requests\UpdateproductosRequest;
use App\Repositories\productosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
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
        return view('productos.create',compact('familias','clientes','tipoacero','tipoestructura'));
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
         $productos = DB::table('productos')->where('id',$id)->get();
         $clientes = DB::table('clientes')->get();
         $familias = DB::table('familias')->get();
         $tipoacero = DB::table('tipoaceros')->get();
         $tipoestructura = DB::table('tipoestructuras')->get();
         $productoDibujos = DB::table('producto_dibujos')->where('id_producto',$id)->get();
         $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp','pp.id_proceso','p.id','pp.id_producto',$id)
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado')
                        ->get();

         $productos = $productos[0];
         $id_producto = $id;

        return view('productos.edit',compact('productos','familias','clientes','tipoacero','tipoestructura','productoDibujos','procesos','id_producto'));
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
            $id_producto = $request->id_producto;
            return json_encode('productos.productos_procesos',compact('procesos','id_producto'));
        }

    }
    

    function show_proceso(Request $request){
        $procesos = DB::table('procesos as p')
                        ->leftjoin('productos_procesos as pp','pp.id_proceso','p.id','pp.id_producto',$request->id_producto)
                        ->selectraw('p.*, if(pp.id_producto>0,1,0) as asignado')
                        ->get();

        $id_producto = $request->id_producto;
        $options = view('productos.productos_procesos',compact('procesos','id_producto'))->render();    
        return json_encode($options);
    }    
}
