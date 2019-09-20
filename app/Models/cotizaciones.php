<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class cotizaciones
 * @package App\Models
 * @version September 20, 2019, 3:18 am UTC
 *
 * @property string fecha
 * @property integer cliente
 * @property string numero_parte
 * @property string descripcion
 * @property integer dibujo
 * @property integer cantidad
 * @property float costo
 * @property float precio_usd
 * @property integer id_notas
 * @property integer tiempo
 * @property integer income
 * @property string termino_pago
 * @property integer vendedor
 */
class cotizaciones extends Model
{
    use SoftDeletes;

    public $table = 'cotizaciones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha',
        'cliente',
        'numero_parte',
        'descripcion',
        'dibujo',
        'cantidad',
        'costo',
        'precio_usd',
        'id_notas',
        'tiempo',
        'income',
        'termino_pago',
        'vendedor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'date',
        'cliente' => 'integer',
        'numero_parte' => 'string',
        'descripcion' => 'string',
        'dibujo' => 'integer',
        'cantidad' => 'integer',
        'costo' => 'float',
        'precio_usd' => 'float',
        'id_notas' => 'integer',
        'tiempo' => 'integer',
        'income' => 'integer',
        'termino_pago' => 'string',
        'vendedor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => 'required',
        'cliente' => 'required',
        'numero_parte' => 'required',
        'dibujo' => 'required',
        'cantidad' => 'required',
        'costo' => 'required',
        'precio_usd' => 'required',
        'tiempo' => 'required',
        'income' => 'required',
        'vendedor' => 'required'
    ];

    
}
