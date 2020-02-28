<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Familia
 * @package App\Models
 * @version September 10, 2019, 4:17 am UTC
 *
 * @property string familia
 * @property string descripcion
 */
class invoices extends Model{

    public $table = 'invoices';
        
}
