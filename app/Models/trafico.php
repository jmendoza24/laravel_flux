<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class trafico
 * @package App\Models
 * @version February 6, 2020, 8:25 pm UTC
 *
 * @property integer id_orden
 * @property integer id_detalle
 */
class trafico extends Model
{
    use SoftDeletes;

    public $table = 'traficos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function get_trafico(){

        $trafico = db::select('select dt.shipping,t.id as ide, c.nombre_corto, l.calle,   p.nombre as npais, e.estado as nestado, l.municipio as nmunicipio
                               from traficos as t 
                               inner join(
                                          select distinct td.id_trafico, cliente, o.shipping
                                          from traficos_detalle td
                                          inner join ordencompra_detalle od on od.id = td.id_detalle
                                          inner join ordenes_compras o on o.id = od.id_orden
                                        ) as dt on dt.id_trafico = t.id
                                inner join clientes as c on c.id = dt.cliente
                                left join logisticas as l on l.id = dt.shipping
                                left join estados as e on e.id = l.estado
                                left join paises as p on p.id = l.pais
                                order by t.id ');

        return $trafico;

    }

    
}
