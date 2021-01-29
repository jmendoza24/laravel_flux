<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * Class equipo_historial
 * @package App\Models
 * @version September 6, 2019, 9:11 pm UTC
 *
 * @property integer historial_tipo
 * @property string responsable
 * @property string descripcion
 * @property string vencimiento
 * @property integer activo
 */
class equipo_historial extends Model
{
    //use SoftDeletes;

    public $table = 'equipo_historials';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'historial_tipo',
        'fecha',
        'responsable',
        'descripcion',
        'vencimiento',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'historial_tipo' => 'integer',
        'fecha' => 'date',
        'responsable' => 'string',
        'descripcion' => 'string',
        'vencimiento' => 'date',
        'activo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'historial_tipo' => 'required',
        'responsable' => 'required',
        'descripcion' => 'required',
        'vencimiento' => 'required'
    ];

    
}
