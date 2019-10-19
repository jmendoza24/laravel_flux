<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ordenes_compra
 * @package App\Models
 * @version October 18, 2019, 7:36 pm UTC
 *
 * @property integer id_cotizacion
 * @property integer cliente
 * @property string notas
 * @property integer income
 * @property integer termino_pago
 * @property integer vendedor
 * @property string fecha
 */
class ordenes_compra extends Model
{
    use SoftDeletes;

    public $table = 'ordenes_compras';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_cotizacion',
        'cliente',
        'notas',
        'income',
        'termino_pago',
        'vendedor',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_cotizacion' => 'integer',
        'cliente' => 'integer',
        'notas' => 'string',
        'income' => 'integer',
        'termino_pago' => 'integer',
        'vendedor' => 'integer',
        'fecha' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
