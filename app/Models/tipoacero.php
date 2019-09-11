<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tipoacero
 * @package App\Models
 * @version September 11, 2019, 3:10 am UTC
 *
 * @property string acero
 * @property string descripcion
 */
class tipoacero extends Model
{
    use SoftDeletes;

    public $table = 'tipoaceros';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'acero',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'acero' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'acero' => 'required',
        'descripcion' => 'required'
    ];

    
}
