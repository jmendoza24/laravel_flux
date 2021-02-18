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
class mes_salarios extends Model{

    public $table = 'mes_salarios';
    
    public $timestamps = false;
    //protected $dates = ['deleted_at'];


    public $fillable = [
                        'fecha',
                        'salario',
                        'id_empleado'
                        ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'string',
        'salario' => 'string',
        'id_empleado'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
