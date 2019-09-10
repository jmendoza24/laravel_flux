<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Familia
 * @package App\Models
 * @version September 10, 2019, 4:17 am UTC
 *
 * @property string familia
 * @property string descripcion
 */
class Familia extends Model
{
    use SoftDeletes;

    public $table = 'familias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'familia',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'familia' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'familia' => 'required',
        'descripcion' => 'required'
    ];

    
}
