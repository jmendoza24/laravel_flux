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
                              'producto'=>0]);           
         }

       $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('productos as p', 'c.producto','p.id')
                        ->leftjoin('clientes as cl','cl.id','p.id_empresa')
                        ->selectraw('c.*, nombre_corto')
                        ->where('c.id',$num_cotizacion)
                        ->get();
        $cotizacion = $cotizacion[0];

       
        $dibujos = DB::table('producto_dibujos')->where('id_producto',$cotizacion->producto)->get();
        $condiciones = DB::table('condiciones')->where('tipo',1)->get();
        $income = DB::table('income_terms')->get();
        $productos = DB::table('productos')->get();

        return view('cotizaciones.index',compact('cotizacion','dibujos','condiciones','income','productos','num_cotizacion'));
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
        DB::table('cotizaciones')
        ->where('id',$request->id_cotizacion)
        ->update(['numero_parte'=>$request->numero_parte,
                  'dibujo'=>$request->dibujo,
                  'tiempo'=>$request->tiempo,
                  'id_notas'=>$request->id_notas,
                  'income'=>$request->income,
                  'descripcion'=>$request->descripcion
              ]);
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
                    set cliente = p.id_empresa,
                        costo = p.costo_produccion,
                        producto = '.$request->id_producto.'              
                where  c.id ='. $num_cotizacion);
           
        $productos = DB::table('productos')->get();
        $dibujos = DB::table('producto_dibujos')->where('id_producto',$request->id_producto)->get();
        $condiciones = DB::table('condiciones')->where('tipo',1)->get();
        $income = DB::table('income_terms')->get();
        $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('productos as p', 'c.producto','p.id')
                        ->leftjoin('clientes as cl','cl.id','p.id_empresa')
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
}
