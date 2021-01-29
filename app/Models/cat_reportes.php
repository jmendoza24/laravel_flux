<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class cat_reportes
 * @package App\Models
 * @version January 21, 2021, 3:32 am UTC
 *
 * @property string nombre
 * @property string documento
 */
class cat_reportes extends Model
{
    use SoftDeletes;

    public $table = 'cat_reportes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'documento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
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
