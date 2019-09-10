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
class TipoMaterial extends Model
{
    use SoftDeletes;

    public $table = 'tipo_materials';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'material',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'material' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'material' => 'required',
        'descripcion' => 'required'
    ];

    
}
