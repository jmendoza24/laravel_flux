<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
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

    function ordenesCompra(){
        return  db::table('ordenes_compras as c')
                        ->leftjoin('users as u','u.id','c.vendedor')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->selectraw("c.*, name, cl.nombre_corto , case c.tipo when 1 then 'Pendiente'  when 2 then 'Validada' when 3 then 'Asignada' when 4 then 'Seguimiento' when 5 then 'Trafico' when 6 then 'Cerrada' else 'Otro' end as estatus ")
                        ->get();
    }

    function header_orden($id_orden){
        $consulta =  DB::table('ordenes_compras as c')
                        ->leftjoin('income_terms as ic','ic.id','c.income')
                        ->leftjoin('clientes as cl', 'cl.id','c.cliente')
                        ->where('c.id',$id_orden)
                        ->selectraw('c.*, ic.descripcion as desc_inco, nombre_corto,id_proveedor , correo_compra, compra_telefono, cl.linea')
                        ->get();
        return $consulta[0];
    }

    function detalle_orden($id_orden,$hijo){

        if($hijo ==1){
            $query = "in (1,0)";
        }else{
            $query = "in (0)";
        }

        return db::select('select c.*, conteo, numero_parte, p.descripcion, tiempo_entrega, costo_material, costo_produccion, f.familia as nfamilia, dibujo_nombre
                               from ordencompra_detalle as c
                               left join productos as p on c.producto = p.id
                               left join familias as f on f.id = p.familia 
                               LEFT JOIN (
                                            select p.id_producto, dibujo_nombre
                                            from (
                                                    SELECT MAX(d.id) as dibujo, id_producto
                                                    from producto_dibujos  as d
                                                    inner join ordencompra_detalle cd on cd.producto = d.id_producto
                                                    WHERE cd.id_orden = '.$id_orden.'
                                                    group by d.id_producto) a
                                            inner join producto_dibujos p on p.id = a.dibujo) d ON d.id_producto = p.id
                                left join (select count(id) as conteo, producto
                                           from  ordencompra_detalle 
                                           WHERE id_orden = '.$id_orden.'
                                           group by producto ) as co on co.producto = c.producto
                                where c.id_orden = '.$id_orden .'
                                and hijo  '.$query.'
                                order by c.id desc');
    }

    function agrega_cantidades($filto){

        db::table('ordencompra_detalle')
        ->where([['id_orden',$filto->id_orden],['hijo',1]])
        ->delete();

        $detalles = db::table('ordencompra_detalle')
                        ->where([['id_orden',$filto->id_orden],['hijo',0]])
                        ->get();
        
        db::update('delete from ordentrabajo_seguimiento where id_orden ='.$filto->id_orden);

        db::select('insert into ordentrabajo_seguimiento(id_orden,id_detalle,id_producto,id_proceso,id_subproceso)
                    select o.id_orden,o.id,producto,p.id_proceso, p.id_subproceso
                    from ordencompra_detalle o 
                    inner join productos_subprocesos p on p.id_producto = o.producto 
                    where id_orden ='.$filto->id_orden);

        foreach ($detalles as $det) {
            #dd($det);
            for($i=1; $i<= $det->cantidad-1; $i++){
              db::select("insert into ordencompra_detalle(id_orden,incremento, producto, dibujo,cantidad,costo,hijo)
                    select id_orden,max(incremento) + 1, producto, dibujo,cantidad,costo,1
                    from ordencompra_detalle
                    where id = ".$det->id.'
                    group by id_orden,producto, dibujo,cantidad,costo');
            }
        }

  /**      db::select('insert into ordentrabajo_seguimiento(id_orden,id_detalle,id_producto,id_proceso,id_subproceso)
                        select o.id_orden,o.id,producto,p.id_proceso, p.id_subproceso
                        from ordencompra_detalle o 
                        inner join productos_subprocesos p on p.id_producto = o.producto 
                        where o.id_orden ='.$filto->id_orden.'
                        and o.id not in (select distinct id_detalle from ordentrabajo_seguimiento where id_orden = '.$filto->id_orden.')');
*/
    }

    function get_procesos_ordenes($id_orden){
        return DB::table('ordencompra_detalle as o')
                ->join('productos_procesos as pp','pp.id_producto','o.producto')
                ->where('id_orden',$id_orden)
                ->selectraw('o.id, pp.id_proceso, o.producto')
                ->get();
    }

     function get_sub_procesos_ordenes($id_orden){
        return DB::table('ordencompra_detalle as o')
                ->join('productos_subprocesos as pp','pp.id_producto','o.producto')
                ->where('id_orden',$id_orden)
                ->selectraw('o.id as id_detalle, pp.id_subproceso,o.producto, pp.id_proceso')
                ->get();
    }

    function informacion_producto($filtro){
        return db::select('select p.*,dibujo, dibujo_nombre,revision
                           from productos p 
                           inner join(
                                       select id_producto, dibujo, dibujo_nombre,revision
                                       from  producto_dibujos 
                                        where id_producto = '.$filtro->id_producto.'
                                        order by id desc 
                                        limit 1 ) d on d.id_producto = p.id
                            where id  = '.$filtro->id_producto);
    }

    
}
