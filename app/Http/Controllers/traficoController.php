<?php

namespace App\Http\Controllers;

use App\Models\trafico;
use App\Models\clientes;
use App\Models\Trafico_documentos;
use App\Models\Trafico_tarimas;
use App\Models\Trafico_flete;
use App\Http\Requests\CreatetraficoRequest;
use App\Http\Requests\UpdatetraficoRequest;
use App\Repositories\traficoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        #$files = db::table('traficos_documentos')->where('id_trafico',83)->get();
       # dd($files);
        
        
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
        $trafico = $request->ide;
        $files = db::table('traficos_documentos')->where('id_trafico',$request->ide)->get();
        $tarimas = Trafico_tarimas::where('id_trafico',$trafico)->get();
        $fletes = Trafico_flete::where('id_trafico',$trafico)->get();
        if(sizeof($fletes)>0){
            $fletes = $fletes[0];
        }else{
            $fletes = array('id_trafico'        => '',
                            'agencia_mx'        => '',
                            'no_plataforma'     => '',
                            'placas'            => '',
                            'pais_orige'        => '',
                            'largo'             => '',
                            'scac'              => '',
                            'caat'              => '',
                            'no_referencia'     => '',
                            'entrada_camion'    => '',
                            'salida_camion'     => '',
                            'arancelaria_usa'   => '',
                            'fecha_entrega'     => '',
                            'tipo_cambio'       => '',
                            'arancelaria_mx'    => '',
                            'liberacion_ad_mx'  =>'',
                            'liberacion_ad_usa' =>'',
                            'entrega_bodega'    =>'');
            $fletes = (object)$fletes;
        }
        
        $options = view('traficos.show_fields',compact('trafico','files','tarimas','fletes'))->render();

        return json_encode($options);
    }

    function finaliza_trafico(Request $request){
        //$trafico_numero = $request->session()->get('no_track');
        $request->session()->forget('no_track');
        return 1;

    }
    function carga_files_trafico(Request $request){
        #Trafico_documentos::truncate();
        $path =  Storage::putFileAs('trafico', $request->file('documento_carga'), $request->file('documento_carga')->getClientOriginalName());
        $existe = Trafico_documentos::where([['id_trafico',$request->id_trafico],['documento',$request->tipo_documento]])->count();
        if($existe > 0){
            Trafico_documentos::where([['id_trafico',$request->id_trafico],['documento',$request->tipo_documento]])
                                ->update(['file'=>$path]);    
        }else{
            Trafico_documentos::insert(['id_trafico'=>$request->id_trafico,
                                        'documento'=>$request->tipo_documento,
                                        'file'=>'storage/'.$path]);    
        }
        
        $files = db::table('traficos_documentos')->where('id_trafico',$request->id_trafico)->get();
        $trafico = $request->id_trafico;

        $options = view('traficos.show_fields',compact('trafico','files'))->render();
        return $options;
    }

    function guarda_trafico_tarima(Request $request){
        Trafico_tarimas::insert(['id_trafico'=>$request->id_trafico,
                                  'peso'=>$request->peso,
                                  'altura'=>$request->altura,
                                  'ancho'=>$request->ancho,
                                  'largo'=>$request->largo,
                                  'pero_tarima'=>$request->pero_tarima]);

        $tarimas = Trafico_tarimas::where('id_trafico',$request->id_trafico)->orderBy('id', 'DESC')->get();

        $options = view('traficos.tarimas',compact('tarimas'))->render();
        return $options;
    }

    function actualiza_tarimas(Request $request){
        Trafico_tarimas::where('id',$request->id)
                        ->update([$request->campo=>$request->valor]);
        $tarimas = Trafico_tarimas::where('id_trafico',$request->id_trafico)->orderBy('id', 'DESC')->get();
        $options = view('traficos.tarimas',compact('tarimas'))->render();
        return $options;
    }
    
    function elimina_tarifa(Request $request){
        Trafico_tarimas::where('id',$request->id)->delete();
        $tarimas = Trafico_tarimas::where('id_trafico',$request->id_trafico)->orderBy('id', 'DESC')->get();
        $options = view('traficos.tarimas',compact('tarimas'))->render();

        return json_encode($options);
    }

    function guarda_flete(Request $request){

        $trafico = new Trafico_flete;
        $existe = Trafico_flete::where('id_trafico',$request->id_trafico)->count();

        if($existe > 0 ){
            Trafico_flete::where('id_trafico',$request->id_trafico)
            ->update([  'agencia_mx'        => $request->aduanal_mx,
                        'no_plataforma'     => $request->no_plataforma,
                        'placas'            => $request->placas,
                        'pais_orige'        => $request->pais_or,
                        'largo'             => $request->amb_largo,
                        'scac'              => $request->scac,
                        'caat'              => $request->caat,
                        'no_referencia'     => $request->num_referencia,
                        'entrada_camion'    => $request->entrada_camion,
                        'salida_camion'     => $request->salida_camion,
                        'arancelaria_usa'   => $request->fraccion_arra,
                        'fecha_entrega'     => $request->fecha_entrega,
                        'tipo_cambio'       => $request->tipo_cambio,
                        'arancelaria_mx'    => $request->fraccion_arra_mx,
                        'liberacion_ad_mx'  => $request->fecha_aduana_mx,
                        'liberacion_ad_usa' => $request->fecha_aduana_us,
                        'entrega_bodega'    => $request->fecha_bodega]);
        }else{
            $trafico->id_trafico        = $request->id_trafico;
            $trafico->agencia_mx        = $request->aduanal_mx;
            $trafico->no_plataforma     = $request->no_plataforma;
            $trafico->placas            = $request->placas;
            $trafico->pais_orige        = $request->pais_or;
            $trafico->largo             = $request->amb_largo;
            $trafico->scac              = $request->scac;
            $trafico->caat              = $request->caat;
            $trafico->no_referencia     = $request->num_referencia;
            $trafico->entrada_camion    = $request->entrada_camion;
            $trafico->salida_camion     = $request->salida_camion;
            $trafico->arancelaria_usa   = $request->fraccion_arra;
            $trafico->fecha_entrega     = $request->fecha_entrega;
            $trafico->tipo_cambio       = $request->tipo_cambio;
            $trafico->arancelaria_mx    = $request->fraccion_arra_mx;
            $trafico->liberacion_ad_mx  = $request->fecha_aduana_mx;
            $trafico->liberacion_ad_usa = $request->fecha_aduana_us;
            $trafico->entrega_bodega    = $request->fecha_bodega;
            $trafico->save();
   
        }
    }

    function informacion_trafico(Request $request){
        $trafico = new trafico;
        $trafico->id_trafico = $request->id_trafico;

        $trafi = $trafico->trafico_info($trafico);
        $traficos = $trafi['trafico'];
        $status_prod = $trafi['status_prod'];

        $options = view('traficos.trafico_informacion',compact('traficos','status_prod'))->render();
        return json_encode($options);
    }
    
}
