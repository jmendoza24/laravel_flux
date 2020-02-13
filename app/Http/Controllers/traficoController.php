<?php

namespace App\Http\Controllers;

use App\Models\trafico;
use App\Models\clientes;
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
        $trafic = new trafico;       
        $traficos = $trafic->get_trafico();

        return view('traficos.index',compact('traficos'));
    }

    function agrega_trafico(Request $request){
        $trafic = new trafico;
        $trafico_numero = $request->session()->get('no_track');
        $cliente_actual  = $trafic->cliente_actual($trafico_numero); 
        if(sizeof($cliente_actual)>0){
            $cliente_actual = $cliente_actual[0];    
        }else{
            $cliente_actual = array('cliente'=>$request->id_cliente,
                                    'nombre_corto'=>'');
            $cliente_actual = (object)$cliente_actual;
        }

        if($cliente_actual->cliente != $request->id_cliente){
            db::table('traficos_detalle')->where('id_trafico',$trafico_numero)->delete();
        }

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
        
        $var = db::table('traficos_detalle')->where('id_trafico',$trafico_numero)->get();
        $cliente_actual  = $trafic->cliente_actual($trafico_numero); 
        #dd($var);
        if(sizeof($cliente_actual)>0){
            $cliente_actual = $cliente_actual[0];    
        }else{
            $cliente_actual = array('cliente'=>0,
                                    'nombre_corto'=>'');
            $cliente_actual = (object)$cliente_actual;
        }
        $traficos = $trafic->filtro_trafico($request->id_cliente,$trafico_numero);
        $options = view('traficos.table',compact('traficos'))->render();

        $arr  = array('cliente_actual'=>$cliente_actual,
                      'options'=>$options);

        return json_encode($arr);
    }
    /**
     * Show the form for creating a new trafico.
     *
     * @return Response
     */
    public function create(Request $request){
        $trafic = new trafico;

        if($request->session()->has('no_track')) {
            $trafico_numero = $request->session()->get('no_track');

         }else{
            $fecha = date('Y-m-d');
            $id = trafico::insertGetId(['id_usuario'=>auth()->id(),
                                        'estatus'=>0]);
            $request->session()->put('no_track',$id);
            $trafico_numero = $request->session()->get('no_track');
         }

        $traficos = $trafic->filtro_trafico(0,$trafico_numero);
        $cliente_actual  = $trafic->cliente_actual($trafico_numero); 
        if(sizeof($cliente_actual)>0){
            $cliente_actual = $cliente_actual[0];    
        }else{
            $cliente_actual = array('cliente'=>0,
                                    'nombre_corto'=>'');
            $cliente_actual = (object)$cliente_actual;
        }
        
        
        $cliente = clientes::get();
        #db::table('traficos_detalle')->where('id_trafico',$trafico_numero)->delete();
        return view('traficos.create',compact('traficos','trafico_numero','cliente','cliente_actual'));
    }

    function muestra_trafico(Request $request){
        $trafic = new trafico;
        $trafico_numero = $request->session()->get('no_track');

        $traficos = $trafic->filtro_trafico($request->id_cliente,$trafico_numero);

        #dd($traficos);
        if(sizeof($traficos)>0){
            $options = view('traficos.table',compact('traficos'))->render();
            
        }else{
            $options = '<br/><br/><h4>No existen idns para este cliente</h4>';
        }
        return json_encode($options);

    }

    function seguimiento_trafico(Request $request){
        $trafico = 1;
        $options = view('traficos.show_fields',compact('trafico'))->render();
        return json_encode($options);
    }

    function finaliza_trafico(Request $request){
        //$trafico_numero = $request->session()->get('no_track');
        $request->session()->forget('no_track');
        return 1;

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
