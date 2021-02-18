<?php
namespace App\Http\Controllers;

use App\Models\mes_salarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\equipo_historial;
use App\Models\documentos_rh;
use Storage;

date_default_timezone_set("America/Mexico_City");

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
        }else if($request->catalogo==2){
          if($request->tipo==1){
              $salarios = array('id'=>0,
                                'id_empleado' =>$request->datos,
                                'salario'=>'');
              $salarios = (object)$salarios;
          }else if($request->tipo==2){
            $salarios = mes_salarios::where('id',$request->id)->get();
            $salarios = $salarios[0];
          }

          $options =  view('tbl_rhs.fields_salarios',compact('salarios'))->render();
        }else if($request->catalogo==3){
          $docs  = db::table('documentos_lista')->orderby('documento')->get();
          if($request->tipo==1){
              $documentos = array('id'=>0,
                                  'tipo'=>$request->datos2,
                                  'id_empleado' =>$request->datos);
              $documentos = (object)$documentos;
          }

          $options =  view('tbl_rhs.carga_documentos',compact('documentos','docs'))->render();
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

            if($request->historial_tipo==1){
                $options = view('equipo_historials.table',compact('equipoHistorials'))->render();
            }else if($request->historial_tipo==2){
                $equipoHistCorrect = $equipoHistorials;
                $options = view('equipo_historials.table_correctivo',compact('equipoHistCorrect'))->render();
            }else if($request->historial_tipo==3){
                $equipoHistPrev = $equipoHistorials;
                $options = view('equipo_historials.table_preventivo',compact('equipoHistPrev'))->render();
            }
            

        }else if($request->id_catalogo == 2){
            $existe = mes_salarios::where('id',$request->id)->count();
            if($existe>0){
              mes_salarios::where('id',$request->id)
                          ->update(['salario'=>$request->salario,
                                    'fecha'=>date('Y-m-d')]);
            }else{
              mes_salarios::insert(['salario'=>$request->salario,
                                    'fecha'=>date('Y-m-d'),
                                    'id_empleado'=>$request->id_empleado]);
            }
            $mes_salarios  = mes_salarios::where('id_empleado',$request->id_empleado)->get();
            $options = view('tbl_rhs.salarios',compact('mes_salarios'))->render();
        }else if($request->id_catalogo == 3){

            $file_img = $request->file('archivo');
            if(!empty($file_img)){
                $img = Storage::url($file_img->store('documentos_rh', 'public'));
                $imgp = strpos($img,'/storage/');
                $doc_prev2 = substr($img, $imgp, strlen($img)); 

                $existe = documentos_rh::where([['id_empleado',$request->id_empleado],['id_documento',$request->tipo_archivo]])->count();
                $dc =  array(6,7,8,9,10,11);

                if($existe > 0 and in_array($request->tipo_archivo, $dc)){
                  documentos_rh::where([['id_empleado',$request->id_empleado],['id_documento',$request->tipo_archivo]])
                                ->update(['archivo'=>$doc_prev2,
                                          'fecha'=>date('Y-m-d')]);
                }else{
                  documentos_rh::insert(['id_empleado'=>$request->id_empleado,
                                       'id_documento'=>$request->tipo_archivo,
                                       'descripcion'=>$request->descripcion,
                                       'archivo'=>$doc_prev2,
                                       'fecha'=>date('Y-m-d')]);
                }
              }

              if($request->tipo==1){
                $documentos = documentos_rh::where('id_empleado',$request->id_empleado)->orderby('id_documento')->get();
                $conteos = db::select('SELECT d2.id_empleado, doc2, doc3, doc4, doc5
                                  FROM (
                                      SELECT id_empleado, COUNT(*) AS doc2
                                      FROM documentos_rh
                                      WHERE id_empleado = '.$request->id_empleado.'
                                      AND id_documento = 2
                                      GROUP BY id_empleado) d2 
                                  LEFT JOIN (
                                      SELECT id_empleado, COUNT(*) AS doc3
                                      FROM documentos_rh
                                      WHERE id_empleado = '.$request->id_empleado.'
                                      AND id_documento = 3
                                      GROUP BY id_empleado) AS d3 ON d3.id_empleado = d2.id_empleado
                                  LEFT JOIN (
                                      SELECT id_empleado, COUNT(*) AS doc4
                                      FROM documentos_rh
                                      WHERE id_empleado = '.$request->id_empleado.'
                                      AND id_documento = 4
                                      GROUP BY id_empleado) AS d4 ON d4.id_empleado = d2.id_empleado
                                  LEFT JOIN (
                                      SELECT id_empleado, COUNT(*) AS doc5
                                      FROM documentos_rh
                                      WHERE id_empleado = '.$request->id_empleado.'
                                      AND id_documento = 5
                                      GROUP BY id_empleado) AS d5 ON d5.id_empleado = d2.id_empleado');
                if(sizeof($conteos)>0){
                  $conteos = $conteos[0];  
                }else{
                  $conteos = array('doc2'=>0,
                                   'doc3'=>0,
                                   'doc4'=>0,
                                   'doc5'=>0);
                  
                  $conteos = (object)$conteos;
                }
                $options = view('tbl_rhs.lista_docs',compact('documentos','conteos'))->render();
              }else{

                $archivos =  documentos_rh::where('id_empleado',$request->id_empleado)
                                          ->whereIn('id_documento',[6,7,8,9,10,11,12])
                                          ->orderby('fecha','desc')
                                          ->get();
                $virtus  = DB::table('virtus')
                                ->where('id_empleado',$request->id_empleado)
                                ->get();
                $virtus=$virtus[0];


                $MyersBriggs  = DB::table('MyersBriggs')
                                        ->where('id_empleado',$request->id_empleado)
                                        ->get();
                $MyersBriggs=$MyersBriggs[0];
                $tblRh =  db::select('SELECT * FROM tbl_rhs where id = '.$request->id_empleado);
                $tblRh = $tblRh[0];
                $options = view('tbl_rhs.evaluaciones',compact('archivos','virtus','MyersBriggs','tblRh'))->render();
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
            
        }else if($request->catalogo==2){
          mes_salarios::where('id',$request->id)->delete();
          $mes_salarios  = mes_salarios::where('id_empleado',$request->dato)->get();
          $options = view('tbl_rhs.salarios',compact('mes_salarios'))->render();
        }

        return json_encode($options);
    }

    
}
