<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subprocesos
 * @package App\Models
 * @version September 10, 2019, 4:13 am UTC
 *
 * @property integer idproceso
 * @property string subproceso
 * @property string descripcion
 */
class Subprocesos extends Model
{
    use SoftDeletes;

    public $table = 'subprocesos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'idproceso',
        'subproceso',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idproceso' => 'integer',
        'subproceso' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idproceso' => 'required',
        'subproceso' => 'required',
        'descripcion' => 'required'
    ];

    
}
