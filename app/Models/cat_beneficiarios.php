<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class cat_beneficiarios
 * @package App\Models
 * @version January 20, 2021, 4:33 am UTC
 *
 * @property string nombre
 * @property string rfc
 * @property string domicilio
 * @property string lugar_nac
 * @property string fecha_nacimiento
 * @property integer parentesco
 * @property string porcentage
 */
class cat_beneficiarios extends Model
{
    use SoftDeletes;

    public $table = 'cat_beneficiarios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'rfc',
        'domicilio',
        'lugar_nac',
        'fecha_nacimiento',
        'parentesco',
        'porcentage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'rfc' => 'string',
        'domicilio' => 'string',
        'lugar_nac' => 'string',
        'fecha_nacimiento' => 'date',
        'parentesco' => 'integer',
        'porcentage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
