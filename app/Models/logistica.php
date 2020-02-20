<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class logistica
 * @package App\Models
 * @version September 4, 2019, 2:00 pm UTC
 *
 * @property string nombre
 * @property string telefono
 * @property string correo
 * @property integer pais
 * @property integer estado
 * @property integer municipio
 * @property string calle
 */
class logistica extends Model
{
    use SoftDeletes;

    public $table = 'logisticas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_producto',
        'nombre',
        'telefono',
        'correo',
        'pais',
        'estado',
        'municipio',
        'calle',
        'numero',
        'cp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_producto'=>'integer',
        'nombre' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
        'pais' => 'integer',
        'estado' => 'integer',
        'municipio' => 'string',
        'calle' => 'string',
        'numero' => 'string',
        'cp' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       
    ];

    function cliente_logisticas($filtros){
        $logisticas = DB::table('logisticas as a')
                    ->leftjoin('estados as e','e.id','=','a.estado')
                    ->leftjoin('paises as p','p.id','=','a.pais')
                    ->where('a.id_producto',$filtros->id_cliente)
                    ->selectraw("a.*, p.nombre as npais, e.estado as nestado, a.municipio as nmunicipio")
                    ->get();

        return $logisticas;
    }

     function cliente_logisticas_actual($filtros){
        $logisticas = DB::table('logisticas as a')
                    ->leftjoin('estados as e','e.id','=','a.estado')
                    ->leftjoin('paises as p','p.id','=','a.pais')
                    ->where('a.id',$filtros->id_logistica)
                    ->selectraw("a.*, p.nombre as npais, e.estado as nestado, a.municipio as nmunicipio")
                    ->get();

        return $logisticas;
    }



    
}
