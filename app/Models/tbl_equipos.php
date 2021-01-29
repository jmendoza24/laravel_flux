<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tbl_equipos
 * @package App\Models
 * @version January 10, 2021, 12:20 am UTC
 *
 */
class tbl_equipos extends Model
{
    use SoftDeletes;

    public $table = 'tbl_equipos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
