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
use DB;
use App\Models\Departamentos;


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
        'id'=>0);
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
    public function store(Createtbl_rhRequest $request)
    {
        $input = $request->all();

        $tblRh = $this->tblRhRepository->create($input);

        Flash::success('Tbl Rh saved successfully.');




        return redirect(route('tblRhs.index'));
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


        


        $mes_salarios  = DB::table('mes_salarios')
            ->where('id_empleado',$id)
            ->get();


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
        $Departamentos = departamentos::all();
//dd($tblRh);

        return view('tbl_rhs.edit',compact('puesto','Departamentos','virtus','MyersBriggs','mes_salarios'))->with('tblRh', $tblRh);
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

        $tblRh = $this->tblRhRepository->update($request->all(), $id);
      //  dd($tblRh);

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
}
