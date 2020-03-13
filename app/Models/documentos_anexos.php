<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Documentos
 * @package App\Models
 * @version September 11, 2019, 3:04 am UTC
 *
 * @property string documento
 * @property string descripcion
 */
class documentos_anexos extends Model{

    public $table = 'documentos_anexos';
    

    protected $dates = ['deleted_at'];

    
}

