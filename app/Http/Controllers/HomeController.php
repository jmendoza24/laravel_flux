<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    function get_municipios(Request $request){
        return 1;
/**
        $municipios = DB::table('tbl_estadosmun as em')
                        ->join('tbl_municipios as m', 'em.municipios_id','=','m.id')
                        ->where('em.estados_id',$request->id_estado)
                        ->selectraw('m.*')
                        ->orderby('m.municipio')
                        ->get();
        return $municipios; */
    }

}
