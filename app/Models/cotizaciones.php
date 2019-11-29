<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

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
        'producto',
        'cliente',
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
        'producto'=>'integer',
        'fecha' => 'date',
        'cliente' => 'integer',
        'id_notas' => 'string',
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
        'cliente' => 'required'
    ];

    function informacion_plaza($filtro){
        return db::table('planta_horas as h')
                ->join('plantas as p','h.id_planta','p.id')
                ->join('productos as pro', 'pro.id','h.id_producto')
                ->where('id_producto',$filtro->id_producto)
                ->selectraw('h.costo, p.nombre, pro.numero_parte')
                ->get();
    }
}
