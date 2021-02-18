<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class condiciones
 * @package App\Models
 * @version September 11, 2019, 3:05 am UTC
 *
 * @property integer tipo
 * @property string condicion
 */
class expediente_empleado extends Model{

    public $table = 'expediente_empleado';

    public $timestamps = false;
    
    
}
