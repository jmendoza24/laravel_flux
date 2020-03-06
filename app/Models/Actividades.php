<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actividades
 * @package App\Models
 * @version September 11, 2019, 2:58 am UTC
 *
 * @property string actividad
 * @property string descripcion
 */
class Actividades extends Model
{
    use SoftDeletes;

    public $table = 'actividades';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'actividad',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'actividad' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'actividad' => 'required',
        'descripcion' => 'required'
    ];

    
}
