<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Puesto
 * @package App\Models
 * @version September 10, 2019, 4:14 am UTC
 *
 * @property string puesto
 * @property string descripcion
 */
class Puesto extends Model
{
    use SoftDeletes;

    public $table = 'puestos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'puesto',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'puesto' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'puesto' => 'required',
        'descripcion' => 'required'
    ];

    
}
