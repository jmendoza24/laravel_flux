<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class clientes
 * @package App\Models
 * @version August 27, 2019, 10:32 pm UTC
 *
 * @property string nombre
 * @property string nombre_corto
 * @property string calle
 * @property integer numero
 * @property integer pais
 * @property integer estado
 * @property integer municipio
 * @property string cp
 * @property integer id_proveedor
 * @property string terminopago
 * @property string compra_nombre
 * @property string telefono
 * @property string correo_compra
 * @property string recepcion_nombre
 * @property string recepcion_telefono
 * @property string recepcion_correo
 * @property string fac_nombre
 * @property sring fac_calle
 * @property integer numero
 * @property integer fac_estado
 * @property integer fac_pais
 * @property integer fac_cp
 * @property string doc_nombre
 * @property string doc_correo
 * @property integer imp_factura
 * @property integer imp_porcentaje
 * @property integer imp_nocertificado
 */
class clientes extends Model
{
    use SoftDeletes;

    public $table = 'clientes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'nombre_corto',
        'calle',
        'numero',
        'pais',
        'estado',
        'municipio',
        'cp',
        'id_proveedor',
        'terminopago',
        'compra_nombre',
        'telefono',
        'correo_compra',
        'recepcion_nombre',
        'recepcion_telefono',
        'recepcion_correo',
        'fac_nombre',
        'fac_calle',
        'numero',
        'fac_estado',
        'fac_pais',
        'fac_cp',
        'doc_nombre',
        'doc_correo',
        'imp_factura',
        'imp_porcentaje',
        'imp_nocertificado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'nombre_corto' => 'string',
        'calle' => 'string',
        'numero' => 'integer',
        'pais' => 'integer',
        'estado' => 'integer',
        'municipio' => 'integer',
        'cp' => 'string',
        'id_proveedor' => 'integer',
        'terminopago' => 'string',
        'compra_nombre' => 'string',
        'telefono' => 'string',
        'correo_compra' => 'string',
        'recepcion_nombre' => 'string',
        'recepcion_telefono' => 'string',
        'recepcion_correo' => 'string',
        'fac_nombre' => 'string',
        'numero' => 'integer',
        'fac_estado' => 'integer',
        'fac_pais' => 'integer',
        'fac_cp' => 'integer',
        'doc_nombre' => 'string',
        'doc_correo' => 'string',
        'imp_factura' => 'integer',
        'imp_porcentaje' => 'integer',
        'imp_nocertificado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}