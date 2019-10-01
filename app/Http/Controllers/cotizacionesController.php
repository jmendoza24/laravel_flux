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
                    ->insert(['fecha' => $fecha]);           
         }

        $cotizacion  = array('producto'=>'',
                               'nombre_corto'=>'',
                               'dibujo'=>'',
                               'id_notas'=>'',
                               'income'=>'',
                               'tiempo'=>'');
        $cotizacion = (object)$cotizacion;

        $dibujos = DB::table('producto_dibujos')->get();
        $condiciones = DB::table('condiciones')->where('tipo',1)->get();
        $income = DB::table('income_terms')->get();
        $productos = DB::table('productos')->get();

        return view('cotizaciones.index',compact('cotizacion','clientes','dibujos','condiciones','income','productos','num_cotizacion'));
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
    public function update($id, UpdatecotizacionesRequest $request)
    {
        $cotizaciones = $this->cotizacionesRepository->find($id);

        if (empty($cotizaciones)) {
            Flash::error('Cotizaciones not found');

            return redirect(route('cotizaciones.index'));
        }

        $cotizaciones = $this->cotizacionesRepository->update($request->all(), $id);

        Flash::success('Cotizaciones updated successfully.');

        return redirect(route('cotizaciones.index'));
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
        
        DB::table('cotizaciones')
            ->where('id',$num_cotizacion)
            ->update(['producto'=>$request->id_producto,
                      'income'=>$request->income,
                      'numero_parte'=>$request->numero_parte,
                      'dibujo'=>$request->dibujo,
                      'descripcion'=>$request->descripcion]);

        DB::update('update cotizaciones as  c
                    inner join productos p on p.id  = c.producto
                    set cliente = p.id_empresa,
                        costo = p.costo_produccion               
                where  c.id ='. $num_cotizacion);
           
        $productos = DB::table('productos')->get();
        $dibujos = DB::table('producto_dibujos')->get();
        $condiciones = DB::table('condiciones')->where('tipo',1)->get();
        $income = DB::table('income_terms')->get();
        $cotizacion = DB::table('cotizaciones as c')
                        ->leftjoin('productos as p', 'c.producto','p.id')
                        ->leftjoin('clientes as cl','cl.id','p.id_empresa')
                        ->selectraw('c.*, nombre_corto')
                        ->where('c.id',$num_cotizacion)
                        ->get();
        $cotizacion = $cotizacion[0];

        $arr = array('cotizacion' => $cotizacion);

         $options = view('cotizaciones.fields',compact('cotizacion','clientes','dibujos','condiciones','income','productos','num_cotizacion'))->render();    
         return json_encode($options);

    }
}
