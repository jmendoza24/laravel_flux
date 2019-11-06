<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Procesos
 * @package App\Models
 * @version September 10, 2019, 4:12 am UTC
 *
 * @property string procesos
 * @property string descripcion
 */
class Procesos extends Model
{
    use SoftDeletes;

    public $table = 'procesos';
    

    protected $dates = ['deleted_at']; 


    public $fillable = [
        'procesos',
        'descripcion',
        'horas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'procesos' => 'string',
        'descripcion' => 'string',
        'horas' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'procesos' => 'required',
        'descripcion' => 'required',
        'horas' => 'required'

    ];

    
}
