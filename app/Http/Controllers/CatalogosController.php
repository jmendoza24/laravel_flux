<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\equipo_historial;
use Storage;
class CatalogosController extends Controller{

	public function __construct(){
        $this->middleware('auth');
    }
/** 
     function get_municipios(Request $request){
    	$municipios = DB::table('tbl_estadosmun as em')
    					->join('tbl_municipios as m', 'em.municipios_id','=','m.id')
    					->where('em.estados_id',$request->id_estado)
    					->selectraw('m.*')
    					->orderby('m.municipio')
    					->get();
        return $municipios;
    }
*/
    
    function get_estados(Request $request){
        $estados = db::table('estados')
                    ->where('id_pais',$request->pais)
                    ->orderby('estado')
                    ->get();

        return $estados;
    }

    function opciones_catalogo(Request $request){
        if($request->catalogo ==1){
            if($request->tipo==1){
                $eqHistofields = array('id'=>0,
                                'responsable'=>'',
                                'fecha'=>'',
                                'descripcion'=>'',
                                'vencimiento'=>'',
                                'historial_tipo'=>$request->datos,
                                'tipo'=>$request->datos2,
                                'documento1'=>'',
                                'documento2'=>'',
                                'activo'=>'');
                $eqHistofields = (object)$eqHistofields;
            }else if($request->tipo==2){
                $eqHistofields = equipo_historial::where('id',$request->id)->get();
                $eqHistofields = $eqHistofields[0];
            }
            $options =  view('equipo_historials.fields',compact('eqHistofields'))->render();
        }

        return json_encode($options);
    }

    function guarda_catalogo(Request $request){

        if($request->id_catalogo==1){
            $existe = equipo_historial::where('id',$request->id)->count();
            if($existe>0){
                $file_img = $request->file('documento1');
                $file_img2 = $request->file('documento2');

               if(!empty($file_img)){
                      $img = Storage::url($file_img->store('documentos', 'public'));
                      $imgp = strpos($img,'/storage/');
                      $doc_prev1 = substr($img, $imgp, strlen($img));                  

                    equipo_historial::where('id',$request->id)
                        ->update(['documento1'=>$doc_prev1]);                      
                }

               if(!empty($file_img2)){
                      $img = Storage::url($file_img2->store('documentos', 'public'));
                      $imgp = strpos($img,'/storage/');
                      $doc_prev2 = substr($img, $imgp, strlen($img));                  
                      equipo_historial::where('id',$request->id)
                        ->update(['documento2'=>$doc_prev2]);
                }

                equipo_historial::where('id',$request->id)
                                ->update(['responsable'=>$request->responsable,
                                          'fecha'=>$request->fecha,
                                          'descripcion'=>$request->descripcion,
                                          'vencimiento'=>$request->vencimiento,
                                          'historial_tipo'=>$request->historial_tipo,
                                          'tipo'=>$request->tipo,
                                          'activo'=>$request->activo]);
            }else{

                $file_img = $request->file('documento1');
                $file_img2 = $request->file('documento2');

               if(!empty($file_img)){
                      $img = Storage::url($file_img->store('documentos', 'public'));
                      $imgp = strpos($img,'/storage/');
                      $doc_prev1 = substr($img, $imgp, strlen($img));                  
                }else{
                    $doc_prev1 = '' ;        
               }

               if(!empty($file_img2)){
                      $img = Storage::url($file_img2->store('documentos', 'public'));
                      $imgp = strpos($img,'/storage/');
                      $doc_prev2 = substr($img, $imgp, strlen($img));                  
                }else{
                    $doc_prev2 = '' ;        
               }

                equipo_historial::insert(['responsable'=>$request->responsable,
                                          'fecha'=>$request->fecha,
                                          'descripcion'=>$request->descripcion,
                                          'vencimiento'=>$request->vencimiento,
                                          'historial_tipo'=>$request->historial_tipo,
                                          'tipo'=>$request->tipo,
                                          'documento1'=>$doc_prev1,
                                          'documento2'=>$doc_prev2,
                                          'activo'=>$request->activo]);
            }
            
            $equipoHistorials = equipo_historial::where([['tipo',$request->tipo],['historial_tipo',$request->historial_tipo]])->get();
            if($request->dato==1){
                $options = view('equipo_historials.table',compact('equipoHistorials'))->render();
            }else if($request->dato==2){
                $equipoHistCorrect = $equipoHistorials;
                $options = view('equipo_historials.table_correctivo',compact('equipoHistCorrect'))->render();
            }else if($request->dato==3){
                $equipoHistPrev = $equipoHistorials;
                $options = view('equipo_historials.table_preventivo',compact('equipoHistPrev'))->render();
            }
            
        }

        return $options;
    }

    function elimina_catalogo(Request $request){ 
        if($request->catalogo==1){
            equipo_historial::where('id',$request->id)->delete();
            $equipoHistorials = equipo_historial::where([['tipo',$request->dato2],['historial_tipo',$request->dato]])->get();
            if($request->dato==1){
                $options = view('equipo_historials.table',compact('equipoHistorials'))->render();
            }else if($request->dato==2){
                $equipoHistCorrect = $equipoHistorials;
                $options = view('equipo_historials.table_correctivo',compact('equipoHistCorrect'))->render();
            }else if($request->dato==3){
                $equipoHistPrev = $equipoHistorials;
                $options = view('equipo_historials.table_preventivo',compact('equipoHistPrev'))->render();
            }
            
        }

        return json_encode($options);
    }

    
}
