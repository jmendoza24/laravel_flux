<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departamentos
 * @package App\Models
 * @version September 10, 2019, 4:15 am UTC
 *
 * @property integer id_familia
 * @property string departamento
 * @property string descripcion
 */
class Departamentos extends Model
{
    use SoftDeletes;

    public $table = 'departamentos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_familia',
        'departamento',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_familia' => 'integer',
        'departamento' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_familia' => 'required',
        'departamento' => 'required',
        'descripcion' => 'required'
    ];

    
}
