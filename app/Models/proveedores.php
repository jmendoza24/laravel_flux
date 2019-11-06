<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class proveedores
 * @package App\Models
 * @version August 27, 2019, 9:43 pm UTC
 *
 * @property string direccion
 * @property integer pais
 * @property integer estado
 * @property integer municipio
 * @property string cp
 * @property string rfc
 * @property string credito
 * @property string telefono
 * @property string correo
 * @property string puesto
 */
class proveedores extends Model
{
    use SoftDeletes;

    public $table = 'proveedores';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'direccion',
        'nombre',
        'pais',
        'estado',
        'municipio',
        'cp',
        'rfc',
        'credito',
        'telefono',
        'correo',
        'puesto',
        'nombre_contacto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre'=>'string',
        'direccion' => 'string',
        'pais' => 'integer',
        'estado' => 'integer',
        'municipio' => 'string',
        'cp' => 'string',
        'rfc' => 'string',
        'credito' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
        'puesto' => 'string',
        'nombre_contacto'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'puesto' => 'required',
        'nombre'=>'required'
    ];

    
}
