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

    function filtro_trafico($id_cliente,$trafico_numero){
        if($id_cliente > 0){
            $where = 'and o.cliente = '.$id_cliente;
        }else{
            $where = '';
        }

        $traficos = db::select('select o.cliente as idcliente,pr.*, if(dt.id_detalle is null, 0,1) as existe, o.shipping, c.nombre_corto, sp.fecha_estimado_termino, a.nombre as planta_name, l.calle,   p.nombre as npais, e.estado as nestado, l.municipio as nmunicipio, pr.id as idproducto, o.orden_compra, d.id as id_detalle, pr.numero_parte, d.incremento, d.fecha_entrega
                                from ordencompra_detalle as  d
                                inner join  ordenes_compras as o on o.id = d.id_orden
                                left join traficos_detalle as dt on dt.id_detalle = d.id and id_trafico = '.$trafico_numero.'
                                left join clientes as c on c.id = o.cliente
                                left join productos as pr on pr.id = d.producto
                                left join seguimiento_planeacion as sp on sp.id_detalle = d.id
                                left join logisticas as l on l.id = o.shipping
                                left join plantas as a on a.id = d.planta
                                left join estados as e on e.id = l.estado
                                left join paises as p on p.id = l.pais
                                where o.tipo = 2
                                '.$where.'
                                and d.id not in (select id_detalle from traficos_detalle where id_trafico not in('.$trafico_numero.') )
                                order by d.id asc');
    return $traficos;
    }

    function cliente_actual($trafico_numero){
        return db::select('select distinct o.cliente, c.nombre_corto
                                from ordencompra_detalle as  d
                                inner join  ordenes_compras as o on o.id = d.id_orden
                                left join traficos_detalle as dt on dt.id_detalle = d.id 
                                left join clientes as c on c.id = o.cliente
                                where id_trafico = '.$trafico_numero.'');
    }

    function trafico_info($filtro){
      $trafico = db::table('traficos_detalle as td')
                ->join('ordencompra_detalle as od', 'od.id' , 'td.id_detalle')
                ->join('productos as p','p.id','od.producto')
                ->where('id_trafico',$filtro->id_trafico)
                ->selectraw('td.id_detalle,p.numero_parte, od.fecha_entrega')
                ->get();

      $status_prod = db::select('select td.id_detalle, ifnull(conteo,0) as conteo
                                from  traficos_detalle td 
                                left join (
                                            select sp.id_detalle, count(*) as conteo, id_trafico
                                            from seguimiento_produccion sp
                                            inner join traficos_detalle td on td.id_detalle = sp.id_detalle
                                            where fecha_fin is null
                                            and id_trafico = '.$filtro->id_trafico.'
                                            group by id_detalle, id_trafico) as a on a.id_detalle = td.id_detalle
                                where td.id_trafico = '.$filtro->id_trafico.'
                                order by td.id_detalle desc');

      $arr = array('trafico'=>$trafico,
                   'status_prod'=>$status_prod);

      return $arr;
    }

    
}
