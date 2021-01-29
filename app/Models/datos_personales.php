<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class datos_personales
 * @package App\Models
 * @version January 19, 2021, 5:17 am UTC
 *
 * @property string tel_casa
 * @property string tel_celular
 * @property string correo
 * @property string contacto1_nombre
 * @property string contacto1_tel_casa
 * @property string contacto1_tel_celular
 * @property string contacto1_relacion
 * @property string contacto2_nombre
 * @property string contacto2_tel_casa
 * @property string contacto2_tel_cel
 * @property string contaco2_relacion
 */
class datos_personales extends Model
{
    use SoftDeletes;

    public $table = 'datos_personales';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tel_casa',
        'tel_celular',
        'correo',
        'contacto1_nombre',
        'contacto1_tel_casa',
        'contacto1_tel_celular',
        'contacto1_relacion',
        'contacto2_nombre',
        'contacto2_tel_casa',
        'contacto2_tel_cel',
        'contaco2_relacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tel_casa' => 'string',
        'tel_celular' => 'string',
        'correo' => 'string',
        'contacto1_nombre' => 'string',
        'contacto1_tel_casa' => 'string',
        'contacto1_tel_celular' => 'string',
        'contacto1_relacion' => 'string',
        'contacto2_nombre' => 'string',
        'contacto2_tel_casa' => 'string',
        'contacto2_tel_cel' => 'string',
        'contaco2_relacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
