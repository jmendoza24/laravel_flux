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
    public function store(Request $request){
         DB::table('equipo_historials')
         ->insert(['tipo'           => $request->tipo, 
                   'historial_tipo' => $request->historia_tipo, 
                   'fecha'          => $request->fecha, 
                   'responsable'    => $request->responsable, 
                   'descripcion'    => $request->descripcion, 
                   'vencimiento'    => $request->vencimiento, 
                   'activo'         => $request->activo
                ]);    

        $equipoHistorials  = DB::table('equipo_historials')
                                ->where([['tipo',$request->tipo],['historial_tipo',$request->historia_tipo]])
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
        
         return json_encode($options);
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

        $options = view("equipo_historials.fields",compact('eqHistofields'))->render();    
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
        DB::table('equipo_historials')
        ->where('id', $request->id_historia)
        ->update([ 'fecha'          => $request->fecha, 
                   'responsable'    => $request->responsable, 
                   'descripcion'    => $request->descripcion, 
                   'vencimiento'    => $request->vencimiento, 
                   'activo'         => $request->activo
                ]);    



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
