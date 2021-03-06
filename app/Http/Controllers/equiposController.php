<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateequiposRequest;
use App\Http\Requests\UpdateequiposRequest;
use App\Repositories\equiposRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\equipos;
use Flash;
use Response;
use DB;

class equiposController extends AppBaseController
{
    /** @var  equiposRepository */
    private $equiposRepository;

    public function __construct(equiposRepository $equiposRepo)
    {
        $this->equiposRepository = $equiposRepo;
    }

    /**
     * Display a listing of the equipos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $fechas =   db::select("SELECT e.tipo, e.historial_tipo, if(e.historial_tipo = 2, e.vencimiento, e.fecha) AS fecha, 
                                        case e.historial_tipo when 1 then 'calibracion' when 2 then 'preventivo' when 3 then 'correctivo' ELSE '' END AS nombre_campo   
                                FROM equipo_historials e
                                INNER JOIN (
                                                SELECT MAX(id) id, historial_tipo
                                                FROM equipo_historials
                                                GROUP BY historial_tipo) a ON e.id = a.id ");

        foreach($fechas as $f){
           equipos::where('id',$f->tipo)
                        ->update([$f->nombre_campo => $f->fecha]);
        }

        $equipos = db::select('SELECT e.*, p.nombre as nom_planta
                                FROM equipos e
                                left JOIN plantas p ON p.id = e.planta');



        return view('equipos.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new equipos.
     *
     * @return Response
     */
    public function create(){

        $equipoHistorials  = array( 'id'=>'',
                                    'historial_tipo'=>'',
                                    'fecha'=>'',
                                    'responsable'=>'',
                                    'descripcion'=>'',
                                    'vencimiento'=>'',
                                    'activo'=>'',
                                    'tipo'=>'',
                                    'documento1'=>'',
                                    'documento2'=>''
                                    );

        $equipoHistorials  = (object)$equipoHistorials ;
        $plantas = db::table('plantas')->get();
        $valida="0";
        $equipos  = array('mantenimiento'=>'',
                          'calibracion'=>'',
                          'planta'=>'',
                          'preventivo'=>'',
                          'correctivo'=>'');
        $equipos = (object)$equipos;
        $preventivo = '';
        $correctivo = '';


        return view('equipos.create',compact('valida','plantas','equipoHistorials','equipos','preventivo','correctivo'));
    }

    /**
     * Store a newly created equipos in storage.
     *
     * @param CreateequiposRequest $request
     *
     * @return Response
     */
    public function store(CreateequiposRequest $request)
    {
        $input = $request->all();
        //$equipos = $this->equiposRepository->create($input);

      //  $input->mantenimiento=date("Y/m/d",strtotime($input->mantenimiento));
    //    dd(date("Y/m/d",strtotime($request->mantenimiento)));
       $id= db::table('equipos')
        ->insertGetId(['mantenimiento'=>$request->mantenimiento,
                          'nombre'=>$request->nombre,
                          'marca'=>$request->marca,
                          'modelo'=>$request->modelo,
                          'serie'=>$request->serie,
                          'pedimento'=>$request->pedimento,
                          'tipo'=>$request->tipo,
                          'base'=>$request->base,
                          'planta'=>$request->planta,
                          'activo'=>$request->activo,

                 ]);
          


        return redirect(route('equipos.edit', [$id]));
    }

    /**
     * Display the specified equipos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipos = $this->equiposRepository->find($id);

        if (empty($equipos)) {
            Flash::error('Equipos not found');

            return redirect(route('equipos.index'));
        }

        return view('equipos.show')->with('equipos', $equipos);
    }

    /**
     * Show the form for editing the specified equipos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipos = $this->equiposRepository->find($id);
         $eqHistofields  = array(   'id'=>'',
                                    'historial_tipo'=>'',
                                    'fecha'=>'',
                                    'responsable'=>'',
                                    'descripcion'=>'',
                                    'vencimiento'=>'',
                                    'activo'=>'',
                                    'tipo'=>$id,
                                    'documento1'=>'',
                                    'documento2'=>''
                                 
                                    );
        $eqHistofields = (object)$eqHistofields;

        $equipoHistorials  = DB::table('equipo_historials')
                                ->where([['tipo',$id],['historial_tipo',1]])
                                ->get();
        $equipoHistPrev    = DB::table('equipo_historials')
                                ->where([['tipo',$id],['historial_tipo',2]])
                                ->get();
        $equipoHistCorrect  = DB::table('equipo_historials')
                                ->where([['tipo',$id],['historial_tipo',3]])
                                ->get();

        if (empty($equipos)) {
            Flash::error('Equipos not found');

            return redirect(route('equipos.index'));
        }
        $plantas = db::table('plantas')->get();

        $fechas =   db::select("SELECT e.tipo, e.historial_tipo, if(e.historial_tipo = 2, e.vencimiento, e.fecha) AS fecha, 
                                        case e.historial_tipo when 1 then 'calibracion' when 2 then 'preventivo' when 3 then 'correctivo' ELSE '' END AS nombre_campo   
                                FROM equipo_historials e
                                INNER JOIN (
                                                SELECT MAX(id) id, historial_tipo
                                                FROM equipo_historials
                                                WHERE tipo = $id
                                                GROUP BY historial_tipo) a ON e.id = a.id ");

        foreach($fechas as $f){
           equipos::where('id',$id)
                        ->update([$f->nombre_campo => $f->fecha]);
        }
        

        return view('equipos.edit',compact('plantas','equipos','equipoHistorials','equipoHistPrev','equipoHistCorrect','eqHistofields'));
    }

    /**
     * Update the specified equipos in storage.
     *
     * @param int $id
     * @param UpdateequiposRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateequiposRequest $request){
        //$equipos = $this->equiposRepository->find($id);
        //$request->mantenimiento=date("Y/m/d",strtotime($request->mantenimiento));
        //dd($request->mantenimiento);
          db::table('equipos')
                ->where('id',$id)
                ->update(['mantenimiento'=>$request->mantenimiento,
                          'nombre'=>$request->nombre,
                          'marca'=>$request->marca,
                          'modelo'=>$request->modelo,
                          'serie'=>$request->serie,
                          'pedimento'=>$request->pedimento,
                          'tipo'=>$request->tipo,
                          'base'=>$request->base,
                          'planta'=>$request->planta,
                          'activo'=>$request->activo,
                         ]);




        //$equipos = $this->equiposRepository->update($request,$request->mantenimiento, $id);


        return redirect(route('equipos.index'));
    }

    /**
     * Remove the specified equipos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipos = $this->equiposRepository->find($id);

        if (empty($equipos)) {
            Flash::error('Equipos not found');

            return redirect(route('equipos.index'));
        }

        $this->equiposRepository->delete($id);

        Flash::success('Equipos deleted successfully.');

        return redirect(route('equipos.index'));
    }
}
