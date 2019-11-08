<?php

namespace App\Http\Controllers;

use App\Models\catalogo_forma;
use App\Models\Forma;
use App\Http\Requests\Createcatalogo_formaRequest;
use App\Http\Requests\Updatecatalogo_formaRequest;
use App\Repositories\catalogo_formaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use View;
use DB;

class catalogo_formaController extends AppBaseController
{
    /** @var  catalogo_formaRepository */
    private $catalogoFormaRepository;

    public function __construct(catalogo_formaRepository $catalogoFormaRepo)
    {
        $this->catalogoFormaRepository = $catalogoFormaRepo;
    }

    /**
     * Display a listing of the catalogo_forma.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $forma = new catalogo_forma();
        
        $formas = Forma::get();
        $ident_1 = $forma->consulta_identificador(1);
        $ident_2 = $forma->consulta_identificador(2);
        $ident_3 = $forma->consulta_identificador(3);
        $ident_4 = $forma->consulta_identificador(4);
        $ident_5 = $forma->consulta_identificador(5);
        $ident_6 = $forma->consulta_identificador(6);
        $ident_7 = $forma->consulta_identificador(7);
        $ident_8 = $forma->consulta_identificador(8);

        return view('catalogo_formas.index',compact('formas','ident_1','ident_2','ident_3','ident_4','ident_5','ident_6','ident_7','ident_8'));
    }

    public function store(Request $request){
        $forma = new catalogo_forma();

        catalogo_forma::create(['id_forma'=>$request->forma,
                                'columna'=>$request->identificador,
                                'valor'=>$request->valor]);

        $ident_1 = $forma->consulta_identificador(1);
        $ident_2 = $forma->consulta_identificador(2);
        $ident_3 = $forma->consulta_identificador(3);
        $ident_4 = $forma->consulta_identificador(4);
        $ident_5 = $forma->consulta_identificador(5);
        $ident_6 = $forma->consulta_identificador(6);
        $ident_7 = $forma->consulta_identificador(7);
        $ident_8 = $forma->consulta_identificador(8);

        $options = view('catalogo_formas.table',compact('ident_1','ident_2','ident_3','ident_4','ident_5','ident_6','ident_7','ident_8'))->render();
        return json_encode($options);
    }

    public function destroy($id){
        
        return redirect(route('catalogoFormas.index'));
    }

}
