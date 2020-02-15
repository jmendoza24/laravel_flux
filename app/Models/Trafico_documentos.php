<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actividades
 * @package App\Models
 * @version September 11, 2019, 2:58 am UTC
 *
 * @property string actividad
 * @property string descripcion
 */
class Trafico_documentos extends Model
{
    use SoftDeletes;

    public $table = 'traficos_documentos';
    

    protected $dates = ['deleted_at'];
    
}
