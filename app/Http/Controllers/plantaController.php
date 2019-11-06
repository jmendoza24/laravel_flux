<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateplantaRequest;
use App\Http\Requests\UpdateplantaRequest;
use App\Repositories\plantaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
class plantaController extends AppBaseController
{
    /** @var  plantaRepository */
    private $plantaRepository;

    public function __construct(plantaRepository $plantaRepo)
    {
        $this->plantaRepository = $plantaRepo;
    } 

    /**
     * Display a listing of the planta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $plantas = DB::table('plantas as p')
                ->leftjoin('estados as e', 'e.id','p.estado')
                ->leftjoin('paises as pa', 'pa.id','p.municipio')
                ->selectraw('p.*, p.municipio as nmunicipio, e.estado as nestado')
                ->get();


        return view('plantas.index')
            ->with('plantas', $plantas);
    }

    /**
     * Show the form for creating a new planta.
     *
     * @return Response
     */
    public function create(){
        $paises = db::table('paises')->get();
        $estados = DB::table('estados')->orderby('estado')->get();
        $municipios = array();
        return view('plantas.create',compact('estados','municipios','paises'));
    }

    /**
     * Store a newly created planta in storage.
     *
     * @param CreateplantaRequest $request
     *
     * @return Response
     */
    public function store(CreateplantaRequest $request)
    {
        $input = $request->all();

        $planta = $this->plantaRepository->create($input);

        Flash::success('Planta saved successfully.');

        return redirect(route('plantas.index'));
    }

    /**
     * Display the specified planta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $planta = $this->plantaRepository->find($id);

        if (empty($planta)) {
            Flash::error('Planta not found');

            return redirect(route('plantas.index'));
        }

        return view('plantas.show')->with('planta', $planta);
    }

    /**
     * Show the form for editing the specified planta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $planta = $this->plantaRepository->find($id);

        if (empty($planta)) {
            Flash::error('Planta not found');

            return redirect(route('plantas.index'));
        }
        $id_pais = $planta->pais;
        $paises = db::table('paises')->get();
        $estados = db::table('estados')
                    ->where('id_pais',$id_pais)
                    ->orderby('estado')
                    ->get();

        return view('plantas.edit',compact('planta','estados','paises'));
    }

    /**
     * Update the specified planta in storage.
     *
     * @param int $id
     * @param UpdateplantaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateplantaRequest $request)
    {
        $planta = $this->plantaRepository->find($id);

        if (empty($planta)) {
            Flash::error('Planta not found');

            return redirect(route('plantas.index'));
        }

        $planta = $this->plantaRepository->update($request->all(), $id);

        Flash::success('Planta updated successfully.');

        return redirect(route('plantas.index'));
    }

    /**
     * Remove the specified planta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $planta = $this->plantaRepository->find($id);

        if (empty($planta)) {
            Flash::error('Planta not found');

            return redirect(route('plantas.index'));
        }

        $this->plantaRepository->delete($id);

        Flash::success('Planta deleted successfully.');

        return redirect(route('plantas.index'));
    }
}
