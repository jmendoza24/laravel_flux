<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatelogisticaRequest;
use App\Http\Requests\UpdatelogisticaRequest;
use App\Repositories\logisticaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class logisticaController extends AppBaseController
{
    /** @var  logisticaRepository */
    private $logisticaRepository;

    public function __construct(logisticaRepository $logisticaRepo)
    {
        $this->logisticaRepository = $logisticaRepo;
    }

    /**
     * Display a listing of the logistica.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $logisticas = DB::table('logisticas as a')
                    ->leftjoin('tbl_estados as e','e.id','=','a.estado')
                    ->leftjoin('tbl_municipios as m','m.id','=','a.municipio')
                    ->selectraw("a.*, if(pais=1,'México','') as npais, e.estado as nestado, m.municipio as nmunicipio")
                    ->get();

        return view('logisticas.index')
            ->with('logisticas', $logisticas);
    }

    /**
     * Show the form for creating a new logistica.
     *
     * @return Response
     */
    public function create(){
        $estados = DB::table('tbl_estados')->orderby('estado')->get();
        
        $logisticas = array();
        //$data = (object)['logisticas'=>''];
        $municipios = array();
        //$data = (object)['municipios'=>''];
        return view('logisticas.create',compact('estados','municipios'));
    }

    /**
     * Store a newly created logistica in storage.
     *
     * @param CreatelogisticaRequest $request
     *
     * @return Response
     */
    public function store(CreatelogisticaRequest $request)
    {
        $input = $request->all();

        $logistica = $this->logisticaRepository->create($input);

        Flash::success('Logistica saved successfully.');

        return redirect(route('logisticas.index'));
    }

    /**
     * Display the specified logistica.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logistica = $this->logisticaRepository->find($id);

        if (empty($logistica)) {
            Flash::error('Logistica not found');

            return redirect(route('logisticas.index'));
        }

        return view('logisticas.show')->with('logistica', $logistica);
    }

    /**
     * Show the form for editing the specified logistica.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Request $request){

        
        $logisticas = DB::table('logisticas')
                    #->leftjoin('tbl_estados as e','e.id','=','a.estado')
                    #->leftjoin('tbl_municipios as m','m.id','=','a.municipio')
                    #->selectraw("a.*, if(pais=1,'México','') as npais, e.estado as nestado, m.municipio as nmunicipio")
                    ->where('id',$request->id_logistica)
                    ->get();

        $logisticas_fields = $logisticas[0];
        $id_estado = $logisticas_fields->estado;
        //$logisticas_fields = $logisticas;

        $estados = DB::table('tbl_estados')->orderby('estado')->get();
        $municipios = DB::table('tbl_estadosmun as em')
                          ->join('tbl_municipios as m','em.municipios_id','=','m.id') 
                          ->selectraw('m.*')
                          ->where('em.estados_id',$id_estado)
                          ->get(); 

        $options = view("logisticas.fields",compact('logisticas_fields','estados','municipios'))->render();    
        return json_encode($options);

    }

    /**
     * Update the specified logistica in storage.
     *
     * @param int $id
     * @param UpdatelogisticaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelogisticaRequest $request)
    {
        $logistica = $this->logisticaRepository->find($id);

        if (empty($logistica)) {
            Flash::error('Logistica not found');

            return redirect(route('logisticas.index'));
        }

        $logistica = $this->logisticaRepository->update($request->all(), $id);

        Flash::success('Logistica updated successfully.');

        return redirect(route('logisticas.index'));
    }

    /**
     * Remove the specified logistica from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logistica = $this->logisticaRepository->find($id);

        if (empty($logistica)) {
            Flash::error('Logistica not found');

            return redirect(route('logisticas.index'));
        }

        $this->logisticaRepository->delete($id);

        Flash::success('Logistica deleted successfully.');

        return redirect(route('logisticas.index'));
    }
}
