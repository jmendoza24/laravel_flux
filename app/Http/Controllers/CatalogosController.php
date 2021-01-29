<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CatalogosController extends Controller{

	public function __construct(){
        $this->middleware('auth');
    }
/** 
     function get_municipios(Request $request){
    	$municipios = DB::table('tbl_estadosmun as em')
    					->join('tbl_municipios as m', 'em.municipios_id','=','m.id')
    					->where('em.estados_id',$request->id_estado)
    					->selectraw('m.*')
    					->orderby('m.municipio')
    					->get();
        return $municipios;
    }
*/
    
    function get_estados(Request $request){
        $estados = db::table('estados')
                    ->where('id_pais',$request->pais)
                    ->orderby('estado')
                    ->get();

        return $estados;
    }

    
}
