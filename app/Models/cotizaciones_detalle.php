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
class cotizaciones_detalle extends Model{

    public $table = 'cotizacion_detalle';
    

    

}
