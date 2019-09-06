<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateequiposRequest;
use App\Http\Requests\UpdateequiposRequest;
use App\Repositories\equiposRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $equipos = $this->equiposRepository->all();

        return view('equipos.index')
            ->with('equipos', $equipos);
    }

    /**
     * Show the form for creating a new equipos.
     *
     * @return Response
     */
    public function create(){
        $equipoHistorials  = array('id'=>'',
                                    'historial_tipo'=>'',
                                    'fecha'=>'',
                                    'responsable'=>'',
                                    'descripcion'=>'',
                                    'vencimiento'=>'',
                                    'activo'=>''
                                    );
        $equipoHistPrev  = array('id'=>'',
                                    'historial_tipo'=>'',
                                    'fecha'=>'',
                                    'responsable'=>'',
                                    'descripcion'=>'',
                                    'vencimiento'=>'',
                                    'activo'=>''
                                    );
        $equipoHistCorrect  = array('id'=>'',
                                    'historial_tipo'=>'',
                                    'fecha'=>'',
                                    'responsable'=>'',
                                    'descripcion'=>'',
                                    'vencimiento'=>'',
                                    'activo'=>''
                                    );

        $equipoHistorials  = (object)$equipoHistorials ;

        return view('equipos.create',compact('equipoHistorials','equipoHistPrev','equipoHistCorrect'));
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

        $equipos = $this->equiposRepository->create($input);

        Flash::success('Equipos saved successfully.');

        return redirect(route('equipos.index'));
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
        $equipoHistorials  = DB::table('equipo_historials')
                                ->where([['id',$id],['historial_tipo',1]])
                                ->get();
        $equipoHistPrev    = DB::table('equipo_historials')
                                ->where([['id',$id],['historial_tipo',2]])
                                ->get();
        $equipoHistCorrect  = DB::table('equipo_historials')
                                ->where([['id',$id],['historial_tipo',3]])
                                ->get();

        if (empty($equipos)) {
            Flash::error('Equipos not found');

            return redirect(route('equipos.index'));
        }

        return view('equipos.edit',compact('equipos','equipoHistorials','equipoHistPrev','equipoHistCorrect'));
    }

    /**
     * Update the specified equipos in storage.
     *
     * @param int $id
     * @param UpdateequiposRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateequiposRequest $request)
    {
        $equipos = $this->equiposRepository->find($id);

        if (empty($equipos)) {
            Flash::error('Equipos not found');

            return redirect(route('equipos.index'));
        }

        $equipos = $this->equiposRepository->update($request->all(), $id);

        Flash::success('Equipos updated successfully.');

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
