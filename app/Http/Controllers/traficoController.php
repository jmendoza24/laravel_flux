<?php

namespace App\Http\Controllers;

use App\Models\trafico;
use App\Http\Requests\CreatetraficoRequest;
use App\Http\Requests\UpdatetraficoRequest;
use App\Repositories\traficoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use Auth;
use Session;

class traficoController extends AppBaseController
{
    /** @var  traficoRepository */
    private $traficoRepository;

    public function __construct(traficoRepository $traficoRepo)
    {
        $this->traficoRepository = $traficoRepo;
    }

    /**
     * Display a listing of the trafico.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        
        if ($request->session()->has('no_track')) {
         $trafico_numero = $request->session()->get('no_track');

         }else{
            $fecha = date('Y-m-d');
            $id = trafico::insertGetId(['id_usuario'=>auth()->id(),
                                        'estatus'=>0]);
            $request->session()->put('no_track',$id);
            $trafico_numero = $request->session()->get('no_track');

         }
      
        $traficos = db::table('ordencompra_detalle as d')
                        ->join('ordenes_compras as o','o.id','d.id_orden')
                        ->leftjoin('productos as pr','pr.id','d.producto')
                        #->leftjoin('clientes as c','id_empresa','c.id')
                        ->leftjoin('seguimiento_planeacion as sp','d.id','sp.id_detalle')
                        ->leftjoin('logisticas as l','l.id','o.shipping')
                        ->leftjoin('plantas as a','a.id','d.planta')
                        ->leftjoin('estados as e','e.id','=','l.estado')
                        ->leftjoin('paises as p','p.id','=','l.pais')
                        ->where('o.tipo',2)
                        ->selectraw('pr.*, o.shipping, sp.fecha_estimado_termino, a.nombre as planta_name, l.calle,   p.nombre as npais, e.estado as nestado, l.municipio as nmunicipio, pr.id as idproducto, o.orden_compra, d.id as id_detalle, pr.numero_parte, d.incremento, d.fecha_entrega')
                        ->orderby('d.id','asc')
                        ->get();

        $var = db::table('ordenes_compras')->get();
        #dd($traficos);
        return view('traficos.index',compact('traficos','trafico_numero'));
    }

    function agrega_trafico(Request $request){
        $trafic = new trafico;

        $trafico_numero = $request->session()->get('no_track');
        $trafic->id_trafico = $trafico_numero;

        $existe = db::table('traficos_detalle')
                    ->where([['id_trafico',$trafico_numero],['id_detalle',$request->id_detalle]])
                    ->count();

        if($existe > 0 and $request->valor==0){
            db::table('traficos_detalle')
                ->where([['id_trafico',$trafico_numero],['id_detalle',$request->id_detalle]])
                ->delete();
        }elseif($request->valor==1 and $existe==0){
             db::table('traficos_detalle')
             ->insert(['id_trafico'=>$trafico_numero,
                       'id_detalle'=>$request->id_detalle]);
        }
        $var = db::table('traficos_detalle')->get();
        
        $trafico = $trafic->get_trafico($trafic);
        return 1;
    }
    /**
     * Show the form for creating a new trafico.
     *
     * @return Response
     */
    public function create(Request $request){
        $trafic = new trafico;
        $trafico_numero = $request->session()->get('no_track');
        $trafic->id_trafico = $trafico_numero;
        $trafico_detalle = $trafic->get_trafico($trafic);
        $trafico = trafico::get();

        return view('traficos.create',compact('trafico_detalle','trafico','trafico_numero'));
    }

    /**
     * Store a newly created trafico in storage.
     *
     * @param CreatetraficoRequest $request
     *
     * @return Response
     */
    public function store(CreatetraficoRequest $request)
    {
        $input = $request->all();

        $trafico = $this->traficoRepository->create($input);

        Flash::success('Trafico saved successfully.');

        return redirect(route('traficos.index'));
    }

    /**
     * Display the specified trafico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trafico = $this->traficoRepository->find($id);

        if (empty($trafico)) {
            Flash::error('Trafico not found');

            return redirect(route('traficos.index'));
        }

        return view('traficos.show')->with('trafico', $trafico);
    }

    /**
     * Show the form for editing the specified trafico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trafico = $this->traficoRepository->find($id);

        if (empty($trafico)) {
            Flash::error('Trafico not found');

            return redirect(route('traficos.index'));
        }

        return view('traficos.edit')->with('trafico', $trafico);
    }

    /**
     * Update the specified trafico in storage.
     *
     * @param int $id
     * @param UpdatetraficoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetraficoRequest $request)
    {
        $trafico = $this->traficoRepository->find($id);

        if (empty($trafico)) {
            Flash::error('Trafico not found');

            return redirect(route('traficos.index'));
        }

        $trafico = $this->traficoRepository->update($request->all(), $id);

        Flash::success('Trafico updated successfully.');

        return redirect(route('traficos.index'));
    }

    /**
     * Remove the specified trafico from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trafico = $this->traficoRepository->find($id);

        if (empty($trafico)) {
            Flash::error('Trafico not found');

            return redirect(route('traficos.index'));
        }

        $this->traficoRepository->delete($id);

        Flash::success('Trafico deleted successfully.');

        return redirect(route('traficos.index'));
    }
}
