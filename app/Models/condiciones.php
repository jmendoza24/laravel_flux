<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class condiciones
 * @package App\Models
 * @version September 11, 2019, 3:05 am UTC
 *
 * @property integer tipo
 * @property string condicion
 */
class condiciones extends Model
{
    use SoftDeletes;

    public $table = 'condiciones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tipo',
        'condicion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo' => 'integer',
        'condicion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required',
        'condicion' => 'required'
    ];

    
}
