<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class producto_dibujo
 * @package App\Models
 * @version September 11, 2019, 3:14 am UTC
 *
 * @property integer id_producto
 * @property string dibujo
 * @property string fecha
 * @property integer revision
 * @property integer tiempo_entrega
 */
class producto_dibujo extends Model
{
    use SoftDeletes;

    public $table = 'producto_dibujos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_producto',
        'dibujo',
        'fecha',
        'revision',
        'tiempo_entrega'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_producto' => 'integer',
        'dibujo' => 'string',
        'fecha' => 'date',
        'revision' => 'integer',
        'tiempo_entrega' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_producto' => 'required',
        'dibujo' => 'required',
        'tiempo_entrega' => 'required'
    ];

    
}
