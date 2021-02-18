<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class equipos
 * @package App\Models
 * @version August 27, 2019, 9:04 pm UTC
 *
 * @property string nombre
 * @property string marca
 * @property string modelo
 * @property string serie
 * @property string pedimento
 * @property integer idequipo
 * @property integer tipo
 * @property integer base
 * @property string calibracion
 */
class equipos extends Model
{
   // use SoftDeletes;

    public $table = 'equipos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'marca',
        'modelo',
        'serie',
        'pedimento',
        'idequipo',
        'tipo',
        'base',
        'calibracion',
         'mantenimiento',
        'correctivo',
        'preventivo',
        'planta',
        'fcalibracion',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'marca' => 'string',
        'modelo' => 'string',
        'serie' => 'string',
        'pedimento' => 'string',
        'idequipo' => 'integer',
        'tipo' => 'integer',
        'base' => 'string',
        'calibracion' => 'string',
        'mantenimiento' => 'date',
        'correctivo' => 'string',
        'preventivo' => 'string',
        'planta' => 'integer',
        'fcalibracion'=>'datetime',
        'activo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}
