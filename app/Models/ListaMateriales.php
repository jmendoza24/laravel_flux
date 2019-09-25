<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ListaMateriales
 * @package App\Models
 * @version September 25, 2019, 10:21 pm UTC
 *
 * @property string material
 */
class ListaMateriales extends Model
{
    use SoftDeletes;

    public $table = 'lista_materiales';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'material',
        'tipo_acero',
        'forma',
        'grado',
        'espesor',
        'ancho',
        'altura',
        'peso_distancia',
        'wide',
        'lenght',
        'weight',
        'precio',
        'peso_pieza',
        'precion_nacional',
        'fecha',
        'num_orden',
        'id_proveedor',
        'molino',
        'pais',
        'colada_numero',
        'fecha_entrega',
        'num_embarque',
        'certificado_mat',
        'ordencompra',
        'remisionprov',
        'reporteprod',
        'resolucionprod'
    ]; 

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'material' => 'string',
        'tipo_acero' => 'integer',
        'forma' => 'integer',
        'grado' => 'integer',
        'espesor' => 'string',
        'ancho' => 'string',
        'altura' => 'string',
        'peso_distancia' => 'string',
        'wide' => 'string',
        'lenght' => 'string',
        'weight' => 'string',
        'precio' => 'string',
        'peso_pieza' => 'string',
        'precion_nacional' => 'string',
        'fecha' => 'date',
        'num_orden' => 'string',
        'id_proveedor' => 'integer',
        'molino' => 'string',
        'pais' => 'string',
        'colada_numero' => 'integer',
        'fecha_entrega' => 'date',
        'num_embarque' => 'string',
        'certificado_mat' => 'string',
        'ordencompra' => 'string',
        'remisionprov' => 'string',
        'reporteprod' => 'string',
        'resolucionprod' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'material' => 'required',
        'tipo_acero' => 'required',
        'forma' => 'required',
        'grado' => 'required',
        'ancho' => 'required'
    ];

    
}
