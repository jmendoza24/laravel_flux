<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * Class productos
 * @package App\Models
 * @version August 22, 2019, 3:03 am UTC
 *
 * @property string descripcion
 * @property integer familia
 * @property integer id_empresa
 * @property integer id_acero
 * @property integer id_estructura
 * @property float espesor
 * @property float ancho
 */
class productos extends Model
{
    use SoftDeletes;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'familia',
        'id_empresa',
        'id_acero',
        'id_estructura',
        'espesor',
        'ancho',
        'tiempo_entrega',
        'costo_material',
        'peso',
        'costo_produccion',
        'planta',
        'numero_parte'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'familia' => 'integer',
        'id_empresa' => 'integer',
        'id_acero' => 'integer',
        'id_estructura' => 'integer',
        'espesor' => 'float',
        'ancho' => 'float',
        'tiempo_entrega'=>'integer',
        'costo_material'=>'float',
        'peso'=>'float',
        'costo_produccion'=>'float',
        'planta'=>'integer',
        'numero_parte'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function forma_identificador($identificador){
        return DB::select("SELECT DISTINCT valor,id_forma,columna,valor,id 
                            FROM catalogo_formas 
                            WHERE columna = ".$identificador."
                            order by  CAST(valor AS float)");
    }

    
    
}
