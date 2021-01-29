<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createequipo_historialRequest;
use App\Http\Requests\Updateequipo_historialRequest;
use App\Repositories\equipo_historialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use View;
use Response;
use DB;
use DateTime;
use Storage;

class equipo_historialController extends AppBaseController
{
    /** @var  equipo_historialRepository */
    private $equipoHistorialRepository;

    public function __construct(equipo_historialRepository $equipoHistorialRepo)
    {
        $this->equipoHistorialRepository = $equipoHistorialRepo;
    }

    /**
     * Display a listing of the equipo_historial.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $equipoHistorials = $this->equipoHistorialRepository->all();

        return view('equipo_historials.index')
            ->with('equipoHistorials', $equipoHistorials);
    }

    /**
     * Show the form for creating a new equipo_historial.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipo_historials.create');
    }

    /**
     * Store a newly created equipo_historial in storage.
     *
     * @param Createequipo_historialRequest $request
     *
     * @return Response
     */
    public function guarda_historial2(Request $request){
        
           $file_img = $request->file('doc_prev1');
           $file_img2 = $request->file('doc_prev2');

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

        //   $nombre = $file_img->getClientOriginalName();

         //  dd($file_img);
            $arreglo= $request->all();
            $pastDate = str_replace(",","",$request->vencimiento);
            $date = new DateTime($pastDate);
            $new_date_format = $date->format('Y-m-d');          
            $pastDate2 = str_replace(",","",$request->fecha);
            $date2 = new DateTime($pastDate2);
            $new_date = $date2->format('Y-m-d');

        

     


        
  $q=       DB::table('equipo_historials')
         ->insert(['tipo'           => $request->id_tipo, 
                   'historial_tipo' => $request->historia_tipo, 
                   'fecha'          => $new_date, 
                   'responsable'    => $request->responsable, 
                   'descripcion'    => $request->descripcion, 
                   'vencimiento'    => $new_date_format, 
                   'activo'         => $request->activo,
                   'documento1'     => $doc_prev1,
                   'documento2'    =>  $doc_prev2

                ]); 

        $equipoHistorials  = DB::table('equipo_historials')
                                ->where([['tipo',$request->id_tipo],['historial_tipo',$request->historia_tipo]])
                                ->get();
        if($request->historia_tipo==1){
            $options = view("equipo_historials.table",compact('equipoHistorials'))->render();  
        }else if($request->historia_tipo==2){
            $equipoHistPrev = $equipoHistorials;
            $options = view("equipo_historials.table_preventivo",compact('equipoHistPrev'))->render();  
        }else if($request->historia_tipo==3){
            $equipoHistCorrect = $equipoHistorials;
            $options = view("equipo_historials.table_correctivo",compact('equipoHistCorrect'))->render();  
        }
               
         return $options;

     //    return $nombre;
        
    }

    /**
     * Display the specified equipo_historial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipoHistorial = $this->equipoHistorialRepository->find($id);

        if (empty($equipoHistorial)) {
            Flash::error('Equipo Historial not found');

            return redirect(route('equipoHistorials.index'));
        }

        return view('equipo_historials.show')->with('equipoHistorial', $equipoHistorial);
    }

    /**
     * Show the form for editing the specified equipo_historial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Request $request){
        $eqHistofields = DB::table('equipo_historials')
                            ->where('id',$request->id_historia)
                            ->get();
        $eqHistofields = $eqHistofields[0];
        $a=1;
        
        $options = view("equipo_historials.fields",compact('eqHistofields','a'))->render();    
        return json_encode($options);
    
    }



    public function show_historia2(Request $request){
        $eqHistofields = DB::table('equipo_historials')
                            ->where('id',$request->id_historia)
                            ->get();
        $eqHistofields = $eqHistofields[0];
        
        $a=0;
        $options = view("equipo_historials.fields",compact('eqHistofields','a'))->render();    
        return json_encode($options);
    
    }


    

    /**
     * Update the specified equipo_historial in storage.
     *
     * @param int $id
     * @param Updateequipo_historialRequest $request
     *
     * @return Response
     */
    public function update(Request $request){

    $pastDate = str_replace(",","",$request->vencimiento);
    $date = new DateTime($pastDate);
    $new_date_format = $date->format('Y-m-d');
    
    $pastDate2 = str_replace(",","",$request->fecha);
    $date2 = new DateTime($pastDate2);
    $new_date = $date2->format('Y-m-d');


        DB::table('equipo_historials')
        ->where('id', $request->id_historia)
        ->update([ 'fecha'          => $new_date, 
                   'responsable'    => $request->responsable, 
                   'descripcion'    => $request->descripcion, 
                   'vencimiento'    => $new_date_format, 
                   'activo'         => $request->activo
                ]);   

          //  dd($request->id_historia);
         //   exit();

        $file_img = $request->file('doc_prev1');
        $file_img2 = $request->file('doc_prev2');

           if(!empty($file_img)){
                  $img = Storage::url($file_img->store('documentos', 'public'));
                  $imgp = strpos($img,'/storage/');
                  $doc_prev1 = substr($img, $imgp, strlen($img));                  
                 DB::table('equipo_historials')
                    ->where('id', $request->id_historia)
                    ->update([ 'documento1' => $doc_prev1]); 
            }

            if(!empty($file_img2)){
                  $img = Storage::url($file_img2->store('documentos', 'public'));
                  $imgp = strpos($img,'/storage/');
                  $doc_prev2 = substr($img, $imgp, strlen($img));                  
                 DB::table('equipo_historials')
                    ->where('id', $request->id_historia)
                    ->update([ 'documento2' => $doc_prev2]); 
            }
 
     
      $equipoHistorials  = DB::table('equipo_historials')
                                ->where([['tipo',$request->id_tipo],['historial_tipo',$request->historia_tipo]])
                                ->get();
        if($request->historia_tipo==1){
            $options = view("equipo_historials.table",compact('equipoHistorials'))->render();  
        }else if($request->historia_tipo==2){
            $equipoHistPrev = $equipoHistorials;
            $options = view("equipo_historials.table_preventivo",compact('equipoHistPrev'))->render();  
        }else{

            $equipoHistCorrect = $equipoHistorials;
            $options = view("equipo_historials.table_correctivo",compact('equipoHistCorrect'))->render();  
        }
               
         return $options;

    }

    /**
     * Remove the specified equipo_historial from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request){
        DB::table('equipo_historials')
        ->where('id', $request->id_historia)
        ->delete();    

        $equipoHistorials  = DB::table('equipo_historials')
                                ->where([['tipo',$request->tipo],['historial_tipo',$request->historial_tipo]])
                                ->get();
        if($request->historial_tipo==1){
            $options = view("equipo_historials.table",compact('equipoHistorials'))->render();  
        }else if($request->historial_tipo==2){
            $equipoHistPrev = $equipoHistorials;
            $options = view("equipo_historials.table_preventivo",compact('equipoHistPrev'))->render();  
        }else if($request->historial_tipo==3){
            $equipoHistCorrect = $equipoHistorials;
            $options = view("equipo_historials.table_correctivo",compact('equipoHistCorrect'))->render();  
        }
        
         return json_encode($options);
        
    }
}
