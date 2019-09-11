<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tipoestructura
 * @package App\Models
 * @version September 11, 2019, 3:11 am UTC
 *
 * @property string estructura
 * @property string descripcion
 */
class tipoestructura extends Model
{
    use SoftDeletes;

    public $table = 'tipoestructuras';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'estructura',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estructura' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estructura' => 'required',
        'descripcion' => 'required'
    ];

    
}
