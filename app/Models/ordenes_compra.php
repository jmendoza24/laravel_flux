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
     $var = db::select('select c.*, cl.nombre_corto , count(d.producto) as cantidad, sum(d.cantidad * costo_produccion) as total
                        from ordenes_compras as c 
                        inner join ordencompra_detalle d on d.id_orden = c.id
                        left join productos as p on d.producto = p.id
                        inner join clientes as cl on cl.id = c.cliente
                        where d.hijo = 0
                        group by c.id');

     $productos = db::table('ordenes_compras as c')
                     ->join('ordencompra_detalle as d','d.id_orden','c.id')
                     ->join('productos as p','d.producto','p.id')
                     ->where('d.hijo',0)
                     ->selectraw('c.id, p.numero_parte')
                     ->get();

      $arr = array('var'=>$var,
                   'productos'=>$productos);

      return $arr;
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
                                order by c.id asc');
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
                    select id_orden,0, producto, dibujo,cantidad,costo,1
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

    function get_procesos_ordenes(){
        return DB::table('ordencompra_detalle as o')
                ->join('ordenes_compras as d','d.id','o.id_orden')
                ->join('productos_procesos as pp','pp.id_producto','o.producto')
                ->where('d.tipo',2)
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
                           left join(
                                       select id_producto, dibujo, dibujo_nombre,revision
                                       from  producto_dibujos 
                                        where id_producto = '.$filtro->id_producto.'
                                        order by id desc 
                                        limit 1 ) d on d.id_producto = p.id
                            where id  = '.$filtro->id_producto);
    }

    function informacion_subprocesos($filtro){

        return db::table('productos_subprocesos as ps')
                        ->leftjoin('subprocesos as s', 's.id','ps.id_subproceso')
                        ->where([['ps.id_producto',$filtro->id_producto],['ps.id_proceso',$filtro->id_proceso]])
                        ->orderby('subproceso')
                        ->get();
       
        #dd($var);
    }

    function get_comentario($filtro){
        
        if($filtro->columna==2){
            $col = 'lanzamiento';
        }else if($filtro->columna==3){
            $col = 'informacion';
        }else if($filtro->columna==4){
            $col = 'pregunta';
        }else if($filtro->columna==5){
            $col = 'pintura';
        }else if($filtro->columna==6){
            $col = 'prog_corte';
        }else if($filtro->columna==7){
            $col = 'tacm';
        }

        return db::table('seguimiento_planeacion')
                    ->where([['id_orden',$filtro->id_orden],['id_detalle',$filtro->id_detalle]])
                    ->get();
    }

    function guardar_seguimiento($filtro){
        #dd($filtro);
        if($filtro->columna==1){
            $col = 'id_planta';
        }else if($filtro->columna==2){
            $col = 'lanzamiento';
        }else if($filtro->columna==3){
            $col = 'informacion';
        }else if($filtro->columna==4){
            $col = 'pregunta';
        }else if($filtro->columna==5){
            $col = 'pintura';
        }else if($filtro->columna==6){
            $col = 'prog_corte';
        }else if($filtro->columna==7){
            $col = 'tacm';
        }else if($filtro->columna==8){
            $col = 'fecha_estimado_termino';
        }else if($filtro->columna=='id_planta' or $filtro->columna=='st_lanzamiento' or $filtro->columna=='st_informacion' or $filtro->columna=='st_pregunta'
                or $filtro->columna=='st_pintura' or $filtro->columna=='st_prog_corte' or $filtro->columna=='st_tacm' or $filtro->columna=='fecha_estimado_termino'){
            $col = $filtro->columna;
        }


        $existe = db::table('seguimiento_planeacion')
                    ->where([['id_orden',$filtro->id_orden],['id_detalle',$filtro->id_detalle]])
                    ->count();
        if($existe >0){

            db::table('seguimiento_planeacion')
                ->where([['id_orden',$filtro->id_orden],['id_detalle',$filtro->id_detalle]])
                ->update([$col=>$filtro->valor]);
                
        }else{
            db::table('seguimiento_planeacion')
                ->insert(['id_orden'=>$filtro->id_orden,
                          'id_detalle'=>$filtro->id_detalle,
                          $col=>$filtro->valor
                         ]);
        }
         

        $var =  db::table('seguimiento_planeacion')
                ->where([['id_orden',$filtro->id_orden],['id_detalle',$filtro->id_detalle]])->get();

    }
    

    function get_materiales($filtro){
        $prod = db::table('seguimiento_materiales as d')
                #->join('producto_materialesforma as p','p.id_producto','d.producto')
                ->where('id_orden',14)
                #->selectraw('d.*')
                ->get();

          #dd($prod);
        $materiales = db::select('select s.id_materia, p.id as idmaterial, d.id_orden, d.id, m.forma as idforma, f.forma as nforma, m.id as idmaterial, d.id as id_detalle, d.producto, m.espesor, p.espesor as pespesor, m.ancho, p.ancho as pancho, m.altura, p.altura as paltura, m.peso_distancia, p.peso_distancia as ppeso_distancia,
                                 p.espesor as pespesor, p.ancho as pancho, p.altura as paltura, p.peso_distancia as pdisct, c.valor as nespesor, c2.valor as nancho, c3.valor as naltura, c4.valor as npeso_distancia, colada_numero
                                 from ordencompra_detalle as d
                                 inner join producto_materialesforma p on d.producto = p.id_producto
                                 inner join materiales m on m.forma = p.forma and ifnull(p.espesor,0) = ifnull(m.espesor,0) and ifnull(p.ancho,0) = ifnull(m.ancho,0) and ifnull(p.altura,0) = ifnull(m.altura,0) and ifnull(p.peso_distancia,0) = ifnull(m.peso_distancia,0) and m.planta = d.planta
                                 left join catalogo_formas c on p.espesor = c.id
                                 left join catalogo_formas c2 on p.ancho = c2.id
                                 left join catalogo_formas c3 on p.altura = c3.id
                                 left join catalogo_formas c4 on p.peso_distancia = c4.id
                                 left join formas as f on f.id = p.forma
                                 left join seguimiento_materiales as s on s.id_materia = m.id
                                 where d.id = ' .$filtro->id_detalle);
        #dd($materiales);    #and p.ancho = m.ancho and p.altura = m.altura and p.peso_distancia = m.peso_distancia 
         #  and p.espesor = m.espesor and p.ancho = m.ancho and p.altura = m.altura and ifnull(p.peso_distancia,0) = ifnull(m.peso_distancia,0)

        $mat_formas =  db::table('ordencompra_detalle as d')
                        ->join('producto_materialesforma as p','d.producto','p.id_producto')
                        ->join('formas as f','f.id','p.forma')
                        ->leftjoin('catalogo_formas as c','p.espesor','c.id')
                        ->leftjoin('catalogo_formas as c2','p.ancho','c2.id')
                        ->leftjoin('catalogo_formas as c3','p.altura','c3.id')
                        ->leftjoin('catalogo_formas as c4','p.peso_distancia','c4.id')
                        ->where('d.id',$filtro->id_detalle)
                        ->selectraw('p.id, p.forma as idforma, p.espesor as pespesor, p.ancho as pancho, p.altura as paltura, p.peso_distancia as ppeso_distancia, f.forma, c.valor as espesor, c2.valor as ancho, c3.valor as altura, c4.valor as peso_distancia')
                        ->get();
         #dd($mat_formas);
        
        $result = array('materiales'=>$materiales,
                        'mat_formas'=>$mat_formas);
#        dd($mat_formas);
        return $result;
    }

    function obtiene_plantas(){
        return db::table('ordenes_compras as o')
               ->join('ordencompra_detalle as d','d.id_orden','o.id')
               ->join('plantas as p','p.id','d.planta')
               ->where([['o.tipo',2],['d.planta','>',0]])
               ->whereNull('enviado_planta')
               ->groupBy('d.planta')
               ->selectraw('d.planta, count(*) conteo, p.nombre')
               ->get();
               
    } 

    function obtiene_info_plantas($filtros){
        return db::table('ordenes_compras as o')
               ->join('ordencompra_detalle as d','d.id_orden','o.id')
               ->leftjoin('productos as p','p.id','d.producto')
               ->leftjoin('plantas as pl','pl.id','d.planta')
               ->where([['o.tipo',2],['d.planta',$filtros->id_planta]])
               ->whereNull('enviado_planta')
               ->selectraw('d.*, pl.nombre,p.descripcion,p.costo_produccion')
               ->get();
    }
}
