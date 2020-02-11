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

    function get_trafico($filtros){

        $trafico =   db::table('ordencompra_detalle as d')
                        ->join('traficos_detalle as t','t.id_detalle','d.id')
                        ->join('ordenes_compras as o','o.id','d.id_orden')
                        ->leftjoin('productos as pr','pr.id','d.producto')
                        ->leftjoin('clientes as c','id_empresa','c.id')
                        ->leftjoin('seguimiento_planeacion as sp','d.id','sp.id_detalle')
                        ->leftjoin('logisticas as l','l.id','o.shipping')
                        ->leftjoin('plantas as a','a.id','d.planta')
                        ->leftjoin('estados as e','e.id','=','l.estado')
                        ->leftjoin('paises as p','p.id','=','l.pais')
                        ->where('t.id_trafico',$filtros->id_trafico)
                        ->selectraw('t.id as ide, pr.*, o.shipping, c.nombre_corto, sp.fecha_estimado_termino, a.nombre as planta_name, l.calle,   p.nombre as npais, e.estado as nestado, l.municipio as nmunicipio, pr.id as idproducto, o.orden_compra, d.id as id_detalle, pr.numero_parte, d.incremento, d.fecha_entrega')
                        ->orderby('d.id','asc')
                        ->get();
        return $trafico;
    }

    
}
