<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * Class catalogo_forma
 * @package App\Models
 * @version November 6, 2019, 6:27 pm UTC
 *
 * @property integer id_forma
 * @property string valor
 */
class catalogo_forma extends Model{
    use SoftDeletes;

    public $table = 'catalogo_formas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_forma',
        'columna',
        'valor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_forma' => 'integer',
        'columna' => 'integer',
        'valor' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_forma' => 'required',
        'valor' => 'required',
        'columna' => 'required'
    ];

    function consulta_identificador($id_forma){
        $identificador = db::table('catalogo_formas as c')
                            ->join('formas as f','c.id_forma','f.id')
                            ->where('c.columna',$id_forma)
                            ->selectraw('c.*,f.forma')
                            ->get();

        return $identificador;

    }
    
}
