<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class puestos
 * @package App\Models
 * @version January 17, 2021, 7:33 pm UTC
 *
 * @property string puesto
 */
class puestos extends Model
{
    use SoftDeletes;

    public $table = 'puestos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'puesto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'puesto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
