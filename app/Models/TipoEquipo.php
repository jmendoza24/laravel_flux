<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoEquipo
 * @package App\Models
 * @version September 10, 2019, 4:18 am UTC
 *
 * @property string equipo
 * @property string descripcion
 */
class TipoEquipo extends Model
{
    use SoftDeletes;

    public $table = 'tipo_equipos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'equipo',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'equipo' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'equipo' => 'required',
        'descripcion' => 'required'
    ];

    
}
