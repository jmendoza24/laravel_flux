<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class planta
 * @package App\Models
 * @version August 23, 2019, 3:40 am UTC
 *
 * @property string nombre
 * @property integer id_planta
 * @property string direccion
 * @property string colonia
 * @property integer municipio
 * @property integer estado
 * @property integer pais
 * @property string cp
 * @property string rfc
 * @property string telefono
 * @property string correo
 * @property string puesto
 */
class planta extends Model
{
 //   use SoftDeletes;

    public $table = 'plantas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'id_planta',
        'direccion',
        'colonia',
        'municipio',
        'estado',
        'pais',
        'cp',
        'rfc',
        'telefono',
        'correo',
        'puesto',
        'contacto_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'id_planta' => 'string',
        'direccion' => 'string',
        'colonia' => 'string',
        'municipio' => 'string',
        'estado' => 'integer',
        'pais' => 'integer',
        'cp' => 'string',
        'rfc' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
        'puesto' => 'string',
        'contacto_name'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estado' => 'required'
    ];

    
}
