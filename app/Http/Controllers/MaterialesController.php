<?php

namespace App\Http\Controllers;
use App\Models\catalogo_forma;
use App\Models\Materiales;
use App\Http\Requests\CreateMaterialesRequest;
use App\Http\Requests\UpdateMaterialesRequest;
use App\Repositories\MaterialesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class MaterialesController extends AppBaseController
{
    /** @var  MaterialesRepository */
    private $materialesRepository;

    public function __construct(MaterialesRepository $materialesRepo)
    {
        $this->materialesRepository = $materialesRepo;
    }

    /**
     * Display a listing of the Materiales.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $materiales = DB::table('materiales as m')
                      ->leftjoin('tipoaceros as t','t.id','m.tipo_acero')
                      ->leftjoin('formas as f','f.id','m.forma')
                      ->leftjoin('plantas as p', 'p.id','m.planta')
                      ->selectraw('m.*, f.forma as nforma, p.nombre as nplanta')
                      ->get();
       # dd($materiales);

        return view('materiales.index')
            ->with('materiales', $materiales);
    }

    /**
     * Show the form for creating a new Materiales.
     *
     * @return Response
     */
    public function create(){
        $forma = new catalogo_forma();
        $materiales = new Materiales();
        $aceros = DB::table('tipoaceros')->orderby('acero')->get();
        $formas = DB::table('formas')->orderby('forma')->get();
        $grados = DB::table('grados')->orderby('grado')->get();
        $proveedores = DB::table('proveedores')->orderby('nombre')->get();
        $plantas = db::table('plantas')->get();
        $materiales->id = 0;
        $materiales->espesor = '';
        $idforma   = 0;
        $espesor   = $forma->consulta_identificador(1);
        $ancho     = $forma->consulta_identificador(2);
        $altura    = $forma->consulta_identificador(3);
        $peso      = $forma->consulta_identificador(4);

        
    

        return view('materiales.create',compact('aceros','formas','grados','proveedores','plantas','materiales','espesor','ancho','altura','peso','idforma'));
    }

    /** 
     * Store a newly created Materiales in storage.
     *
     * @param CreateMaterialesRequest $request
     *
     * @return Response
     */
    public function store(CreateMaterialesRequest $request)
    {
        $input = $request->all();
        $input['precio'] = str_replace('$', '', str_replace(',', '', $input['precio']));

        $materiales = $this->materialesRepository->create($input);


        Flash::success('Materiales saved successfully.');

        return redirect(route('materiales.index'));
    }

    /**
     * Display the specified Materiales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materiales = $this->materialesRepository->find($id);

        if (empty($materiales)) {
            Flash::error('Materiales not found');

            return redirect(route('materiales.index'));
        }

        return view('materiales.show')->with('materiales', $materiales);
    }

    /**
     * Show the form for editing the specified Materiales.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $forma = new catalogo_forma();
        #$materiales = $this->materialesRepository->find($id);
        $materiales = DB::table('materiales')->where('id',$id)->get();
        $materiales = $materiales[0];
        $aceros = DB::table('tipoaceros')->orderby('acero')->get();
        $formas = DB::table('formas')->orderby('forma')->get();
        $grados = DB::table('grados')->orderby('grado')->get();
        $proveedores = DB::table('proveedores')->orderby('nombre')->get();
        $plantas = db::table('plantas')->get();

        $espesor   = $forma->consulta_identificador(1);
        $ancho     = $forma->consulta_identificador(2);
        $altura    = $forma->consulta_identificador(3);
        $peso      = $forma->consulta_identificador(4); 
        $idforma   = $materiales->forma;

        return view('materiales.edit',compact('materiales','aceros','formas','grados','proveedores','plantas','espesor','ancho','altura','peso','idforma'));
    }

    /**
     * Update the specified Materiales in storage.
     *
     * @param int $id
     * @param UpdateMaterialesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaterialesRequest $request)
    {
        $materiales = $this->materialesRepository->find($id);
        if (empty($materiales)) {
            Flash::error('Materiales not found');

            return redirect(route('materiales.index'));
        }


        $materiales = $this->materialesRepository->update($request->all(), $id);
       # dd($materiales);

        Flash::success('Materiales updated successfully.');

        return redirect(route('materiales.index'));
    }

    /**
     * Remove the specified Materiales from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materiales = $this->materialesRepository->find($id);

        if (empty($materiales)) {
            Flash::error('Materiales not found');

            return redirect(route('materiales.index'));
        }

        $this->materialesRepository->delete($id);

        Flash::success('Materiales deleted successfully.');

        return redirect(route('materiales.index'));
    }

    function busca_forma(Request $request){
        $forma = new catalogo_forma();
        //$material = new materiales();

        $materiales = Materiales::where('id',$request->idmateriales)->get();
        if(sizeof($materiales)>0){
            $materiales = $materiales[0];    
        }else{
            $materiales = array('id'=>0,
                                'espesor'=>0,
                                'ancho'=>0,
                                'altura'=>0,
                                'peso_distancia'=>0);
            $materiales  = (object)$materiales;            
        }
        
        $idforma = $request->forma;

        $espesor   = $forma->consulta_identificador(1);
        $ancho     = $forma->consulta_identificador(2);
        $altura    = $forma->consulta_identificador(3);
        $peso      = $forma->consulta_identificador(4);   
        
        $options = view('materiales.medidas',compact('espesor','ancho','altura','peso','idforma','materiales'))->render();

        return json_encode($options);
        
    }
}
