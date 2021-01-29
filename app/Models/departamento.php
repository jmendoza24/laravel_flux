<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class departamento
 * @package App\Models
 * @version January 17, 2021, 11:42 pm UTC
 *
 * @property string departamento
 */
class departamento extends Model
{
    use SoftDeletes;

    public $table = 'departamentos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'departamento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'departamento' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
