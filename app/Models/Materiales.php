<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Materiales
 * @package App\Models
 * @version September 18, 2019, 5:27 pm UTC
 *
 * @property integer tipo_acero
 * @property integer forma
 * @property integer grado
 * @property string espesor
 * @property string ancho
 * @property string altura
 * @property string peso_distancia
 * @property string wide
 * @property string lenght
 * @property string weight
 * @property string precio
 * @property string peso_pieza
 * @property string precion_nacional
 * @property string fecha
 * @property string num_orden
 * @property integer id_proveedor
 * @property string molino
 * @property string pais
 * @property integer colada_numero
 * @property string fecha_entrega
 * @property string num_embarque
 * @property string certificado_mat
 * @property string ordencompra
 * @property string remisionprov
 * @property string reporteprod
 * @property string resolucionprod
 */
class Materiales extends Model
{
    use SoftDeletes;

    public $table = 'materiales';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'tipo_acero' => 'required',
        'forma' => 'required',
        'grado' => 'required',
        'ancho' => 'required'
    ];

    
}