<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Grado
 * @package App\Models
 * @version September 10, 2019, 4:22 am UTC
 *
 * @property string grado
 * @property string descripcion
 */
class Grado extends Model
{
    use SoftDeletes;

    public $table = 'grados';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'grado',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'grado' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'grado' => 'required',
        'descripcion' => 'required'
    ];

    
}
