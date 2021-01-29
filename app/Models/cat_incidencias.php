<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class cat_incidencias
 * @package App\Models
 * @version January 21, 2021, 3:27 am UTC
 *
 * @property string incidencia
 * @property string documento
 */
class cat_incidencias extends Model
{
    use SoftDeletes;

    public $table = 'cat_incidencias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'incidencia',
        'documento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'incidencia' => 'string',
        'documento' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
