<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoMaterial
 * @package App\Models
 * @version September 10, 2019, 4:19 am UTC
 *
 * @property string material
 * @property string descripcion
 */
class Seguimiento_materiales extends Model
{

    public $table = 'seguimiento_materiales';
    

    protected $dates = ['deleted_at'];
    
}
