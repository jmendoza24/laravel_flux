<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtbl_rhRequest;
use App\Http\Requests\Updatetbl_rhRequest;
use App\Repositories\tbl_rhRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Puesto;
use App\Models\mes_salarios;
use App\Models\documentos_rh;
use App\Models\expediente_empleado;
use DB;
use Storage;
use App\Models\tbl_rh;
#use App\Models\Departamentos;
use App\Models\departamento;


class tbl_rhController extends AppBaseController
{
    /** @var  tbl_rhRepository */
    private $tblRhRepository;

    public function __construct(tbl_rhRepository $tblRhRepo)
    {
        $this->tblRhRepository = $tblRhRepo;
    }

    /**
     * Display a listing of the tbl_rh.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tblRhs = $this->tblRhRepository->all();

        return view('tbl_rhs.index')
            ->with('tblRhs', $tblRhs);
    }

    /** 
     * Show the form for creating a new tbl_rh.
     *
     * @return Response
     */
    public function create()
    {
      $tblRh = array('id_empleado'=>'',
                     'id'=>0,
                     'genero'=>'',
                     'identificacion'=>'',
                     'doc_imss'=>'',
                     'sal_ini_fecha'=>'',
                     'fecha_nacimiento'=>'',
                     'contrato'=>'',
                     'notas'=>'');
      $tblRh = (object)$tblRh;

        return view('tbl_rhs.create',compact('tblRh'));
    }

    /**
     * Store a newly created tbl_rh in storage.
     *
     * @param Createtbl_rhRequest $request
     *
     * @return Response
     */
    public function store(Createtbl_rhRequest $request){
        $input = $request->all();

        $doc_imss = $request->file('doc_imss');
        $identificacion = $request->file('identificacion');

        if(!empty($doc_imss)){
            $img = Storage::url($doc_imss->store('rh', 'public'));
            $imgp = strpos($img,'/storage/');
            $doc_imss = substr($img, $imgp, strlen($img));                  
        }else{
            $doc_imss = '' ;        
        }

        if(!empty($identificacion)){
            $img = Storage::url($identificacion->store('rh', 'public'));
            $imgp = strpos($img,'/storage/');
            $identificacion = substr($img, $imgp, strlen($img));                  
        }else{
            $identificacion = '' ;        
        }

        $input['doc_imss'] = $doc_imss;
        $input['identificacion'] = $identificacion;
        

        $tblRh = $this->tblRhRepository->create($input);
/**
         $conte = mes_salarios::where('id_empleado',$tblRh->id)->count();
         if($conte == 0){
          if($input['sal_ini'] != ''){
              db::select("insert into mes_salarios(salario,fecha, id_empleado)
                          select ".$input['sal_ini'] .",CURDATE(),".$input->id);
              
              db::select("update tbl_rhs set sal_ini_fecha=  CURDATE() where id = ".$input->id);
              
            }
        }
*/

        Flash::success('Tbl Rh saved successfully.');




        return redirect('tblRhs/'.$tblRh->id.'/edit');
    }

    /**
     * Display the specified tbl_rh.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblRh = $this->tblRhRepository->find($id);

        if (empty($tblRh)) {
            Flash::error('Tbl Rh not found');

            return redirect(route('tblRhs.index'));
        }

        return view('tbl_rhs.show')->with('tblRh', $tblRh);
    }

    /**
     * Show the form for editing the specified tbl_rh.
     *
     * @param int $id
     *   
     * @return Response
     */

public function sal_actualiza(Request $request){


        $mes_salarios  = DB::table('mes_salarios')
            ->where('id_empleado',$request->id_empleado)
            ->get();

          
       $option= view('tbl_rhs.salarios',compact('mes_salarios'))->render();

      return json_encode($option);


}


 public function delete_salario(Request $request)
 {

  db::table('mes_salarios')
            ->where('id',$request->id)
            ->delete();
  return 1;
 }

    public function edit($id)
    {
        $tblRh = $this->tblRhRepository->find($id);

        if (empty($tblRh)) {
            Flash::error('Tbl Rh not found');

            return redirect(route('tblRhs.index'));
        }


        


       $mes_salarios  = mes_salarios::where('id_empleado',$id)->orderby('id','desc')->get();


        $v  = DB::table('virtus')
            ->where('id_empleado',$id)
            ->get()->count();


        $c  = DB::table('MyersBriggs')
            ->where('id_empleado',$id)
            ->get()->count();

        if($c==0){


         DB::table('MyersBriggs')
         ->insert(['id_empleado'=> $id,
                    'fecha'  => now(),
                  ]); 
        }

        if($v==0){

         $q= DB::table('virtus')
         ->insert(['id_empleado'=> $id,
                    'fecha'  => now(),
                  ]); 


         
        }


        $virtus  = DB::table('virtus')
                                ->where('id_empleado',$id)
                                ->get();
        $virtus=$virtus[0];


        $MyersBriggs  = DB::table('MyersBriggs')
                                ->where('id_empleado',$id)
                                ->get();
        $MyersBriggs=$MyersBriggs[0];
        

        $puesto = puesto::all();
        $Departamentos = departamento::get();

        $documentos = db::table('documentos_rh as d')
                        ->join('documentos_lista as l','d.id_documento','l.id')
                        ->where('id_empleado',$id)
                        ->selectraw('d.*, l.documento')
                        ->orderby('id_documento')
                        ->get();

        $expediente = documentos_rh::where([['id_empleado',$id],['id_documento',1]])->get();
        if(sizeof($expediente)>0){
          $expediente = $expediente[0];  
        }else{
          $expediente = array('archivo'=>'');
          $expediente = (object)$expediente;
        }
        
        $docs = db::select('SELECT d.*, existe
                            FROM documentos_lista d
                            LEFT JOIN expediente_empleado e ON d.id = e.id_documento AND id_empleado= '.$id);
        $conteos = db::select('SELECT id_empleado, id_documento, COUNT(*) AS conteo
                              FROM documentos_rh
                              WHERE id_empleado = '.$id.'
                              AND id_documento IN (2,3,4,5)
                              GROUP BY id_documento, id_empleado');

        $archivos =  documentos_rh::where('id_empleado',$id)
                                  ->whereIn('id_documento',[6,7,8,9,10,11,12])
                                  ->orderby('fecha','desc')
                                  ->get();
        

        return view('tbl_rhs.edit',compact('puesto','Departamentos','virtus','MyersBriggs','mes_salarios','documentos','docs','expediente','tblRh','conteos','archivos','id'));
    }


    public function salario(Request $request){

         DB::table('mes_salarios')
         ->insert(['id_empleado'=> $request->id,
                    'Fecha'  => now(),
                    'salario' => $request->salario
                  ]);
         return 1;

    }


     public function MyersBriggs(Request $request)
    {

        DB::table('MyersBriggs')
        ->where('id_empleado', $request->id)
        ->update([ 'Introversion'      => $request->Introversion, 
                   'Extroversion'    => $request->Extroversion, 
                   'Intuitivo'    => $request->Intuitivo, 
                   'Sensorial'    => $request->Sensorial, 
                   'Pensamiento'         => $request->Pensamiento,
                   'IEmocional'         => $request->IEmocional,
                   'Calificador'         => $request->Calificador,
                   'Perceptivo'         => $request->Perceptivo
                  
                ]);
    }

     public function virtus(Request $request)
    {
        

        DB::table('virtus')
        ->where('id_empleado', $request->id)
        ->update([ 'Emociones'      => $request->Emociones, 
                   'Pensamientos'    => $request->Pensamientos, 
                   'Compromiso'    => $request->Compromiso, 
                   'Relaciones'    => $request->Relaciones, 
                   'Sentido'         => $request->Sentido,
                   'Logros'         => $request->Logros,
                   'Salud'         => $request->Salud,
                   'Soledad'         => $request->Soledad,
                   'Felicidad'         => $request->Felicidad,
                   'Promedio'         => $request->Promedio,
                   'Sabiduria'         => $request->Sabiduria,
                   'Valor'         => $request->Valor,
                   'Humanidad'         => $request->Humanidad,
                   'Justicia'         => $request->Justicia,
                   'Trascendencia'         => $request->Trascendencia,
                   'Templanza'         => $request->Templanza,
                   'Creatividad'         => $request->Creatividad,
                   'Amor'         => $request->Amor,
                   'Curiosidad'         => $request->Curiosidad,
                   'Perspectiva'         => $request->Perspectiva,
                   'Juicio'         => $request->Juicio,
                   'Honestidad'         => $request->Honestidad,
                   'Perseverancia'         => $request->Perseverancia,
                   'Entusiasmo'         => $request->Entusiasmo,
                   'Valentia'         => $request->Valentia,
                   'Amabilidad'         => $request->Amabilidad,
                   'Inteligencia'         => $request->Inteligencia,
                   'Amor_amor'         => $request->Amor_amor,
                   'Equidad'         => $request->Equidad,
                   'Liderazgo'         => $request->Liderazgo,
                   'Trabajo'         => $request->Trabajo,
                   'Esperitualidad'         => $request->Esperitualidad,
                   'Gratitud'         => $request->Gratitud,
                   'Esperanza'         => $request->Esperanza,
                   'Humor'         => $request->Humor,
                   'Belleza'         => $request->Belleza,
                   'Prudencia'         => $request->Prudencia,
                   'Humildad'         => $request->Humildad,
                   'Perdon'         => $request->Perdon,
                   'Control'         => $request->Control
                ]);
        }
    /**
     * Update the specified tbl_rh in storage.
     *
     * @param int $id
     * @param Updatetbl_rhRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetbl_rhRequest $request)
    {   

        $tblRh = $this->tblRhRepository->find($id);

        if (empty($tblRh)) {
            Flash::error('Tbl Rh not found');

            return redirect(route('tblRhs.index'));
        }

        $doc_imss = $request->file('doc_imss');
        $identificacion = $request->file('identificacion');

        $tblRh = $request->all();

        if(!empty($doc_imss)){
            $img = Storage::url($doc_imss->store('rh', 'public'));
            $imgp = strpos($img,'/storage/');
            $imss = substr($img, $imgp, strlen($img));   

            $tblRh['doc_imss'] = $imss;
            //tbl_rh::where('id',$id)->update(['doc_imss'=>$imss]);               

        }else{
          unset($tblRh['doc_imss']);
        }

        if(!empty($identificacion)){
            $img = Storage::url($identificacion->store('rh', 'public'));
            $imgp = strpos($img,'/storage/');
            $identi = substr($img, $imgp, strlen($img));      

            $tblRh['identificacion'] = $identi;
            //tbl_rh::where('id',$id)->update(['identificacion'=>$identi]);                           
        }else{
          unset($tblRh['identificacion']);
        }

        $tblRh = $this->tblRhRepository->update($tblRh, $id);
/**
        $conte = mes_salarios::where('id_empleado',$id)->count();
        if($conte == 0){
          if($tblRh['sal_ini'] > 0){
              db::update("insert into mes_salarios(salario,fecha, id_empleado)
                          select ".$tblRh['sal_ini'] .",CURDATE(),".$id);
              
              db::update("update tbl_rhs set sal_ini_fecha=  CURDATE() where id = ".$id);
              
            }
        }

        $conte = mes_salarios::where('id_empleado',$id)->count();
        

*/
        

        Flash::success('Tbl Rh updated successfully.');

        return redirect(route('tblRhs.index'));
    }

    /**
     * Remove the specified tbl_rh from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblRh = $this->tblRhRepository->find($id);

        if (empty($tblRh)) {
            Flash::error('Tbl Rh not found');

            return redirect(route('tblRhs.index'));
        }

        $this->tblRhRepository->delete($id);

        Flash::success('Tbl Rh deleted successfully.');

        return redirect(route('tblRhs.index'));
    }

    function guarda_check(Request $request){
        $existe = expediente_empleado::where([['id_empleado',$request->id_empleado],['id_documento',$request->id_documento]])->count();

        if($existe > 0){
            expediente_empleado::where([['id_empleado',$request->id_empleado],['id_documento',$request->id_documento]])
                              ->update(['existe'=>$request->val]);          
        }else{
          expediente_empleado::insert(['existe'=>$request->val,
                                       'id_documento'=>$request->id_documento,
                                       'id_empleado'=>$request->id_empleado]);          
        }
        return 1;
    }

}
