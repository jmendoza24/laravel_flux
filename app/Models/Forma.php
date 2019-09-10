<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Forma
 * @package App\Models
 * @version September 10, 2019, 4:24 am UTC
 *
 * @property string forma
 * @property string descripcion
 */
class Forma extends Model
{
    use SoftDeletes;

    public $table = 'formas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'forma',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'forma' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'forma' => 'required',
        'descripcion' => 'required'
    ];

    
}
