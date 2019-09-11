<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Documentos
 * @package App\Models
 * @version September 11, 2019, 3:04 am UTC
 *
 * @property string documento
 * @property string descripcion
 */
class Documentos extends Model
{
    use SoftDeletes;

    public $table = 'documentos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'documento',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'documento' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'documento' => 'required',
        'descripcion' => 'required'
    ];

    
}
