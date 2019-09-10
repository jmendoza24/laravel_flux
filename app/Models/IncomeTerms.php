<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IncomeTerms
 * @package App\Models
 * @version September 10, 2019, 4:25 am UTC
 *
 * @property string income
 * @property string descripcion
 */
class IncomeTerms extends Model
{
    use SoftDeletes;

    public $table = 'income_terms';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'income',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'income' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'income' => 'required',
        'descripcion' => 'required'
    ];

    
}
