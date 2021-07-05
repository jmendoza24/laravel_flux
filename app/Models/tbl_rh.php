<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tbl_rh
 * @package App\Models
 * @version January 17, 2021, 6:36 pm UTC
 *
 * @property string num_empleado
 * @property string nombre
 * @property string direccion
 * @property string lugar_nacimiento
 * @property string fecha_nacimiento
 * @property int grado_escolaridad
 * @property integer edo_civil
 * @property integer religion
 * @property string imss
 * @property string doc_imss
 */
class tbl_rh extends Model
{

    public $table = 'tbl_rhs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'num_empleado',
        'nombre',
        'direccion',
        'lugar_nacimiento',
        'fecha_nacimiento',
        'grado_escolaridad',
        'edo_civil',
        'religion',
        'imss',
        'doc_imss',
        'fecha_subida',
        'curp',
        'rfc',
        'identificacion',
        'tc',
        'tcf',
        'correo',
        'n1',
        't1ct',
        'relacion',
        't1cc',
        'n2',
        't2cc',
        'relacion2',
        't2ct',
        'camisa',
        'pantalon',
        'calzado',
        'rfc_b1',
        'domicilio_bene',
        'lugar_nacimiento_bene',
        'fecha_nacimiento_bene',
        'parentesco',
        'porcentaje',
        'nombre_bene2',
        'rfc_b2',
        'domicilio_bene2',
        'lugar_nacimiento_bene2',
        'fecha_nacimiento_bene2',
        'parentesco_bene2',
        'porcentaje2',
        'nombre_bene3',
        'rfc_b3',
        'domicilio_bene3',
        'lugar_nacimiento_bene3',
        'fecha_nacimiento_bene3',
        'parentesco_bene3',
        'porcentaje3',
        'n_beneficiario',
        'genero',
        'contrato',
        'estatus',
        'salario_mensual',
        'salario_diario',
        'Vencimiento_contrato',
        'Vencimiento_prueba',
        'fecha_fin',
        'fecha_ingreso',
        'nombre_sup',
        'departamento',
        'puesto',
        'sal_ini_fecha',
        'sal_ini',
        'reviciones',
        'notas'

        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'num_empleado' => 'string',
        'nombre' => 'string',
        'direccion' => 'string',
        'lugar_nacimiento' => 'string',
        'fecha_nacimiento' => 'string',
        'edo_civil' => 'integer',
        'religion' => 'integer',
        'imss' => 'string',
        'doc_imss' => 'string',
        'fecha_subida' => 'string',
        'curp' => 'string',
        'rfc' => 'string',
        'identificacion' => 'string',
        'tc'=> 'string',
        'tcf'=> 'string',
        'correo'=> 'string',
        'n1'=> 'string',
        't1ct'=> 'string',
        'relacion'=> 'string',
        't1cc'=> 'string',
        'n2'=> 'string',
        't2cc'=> 'string',
        'relacion2'=> 'string',
        't2ct'=> 'string',
        'camisa'=> 'string',
        'pantalon'=> 'string',
        'calzado'=> 'string',
        'rfc_b1'=> 'string',
        'domicilio_bene'=> 'string',
        'lugar_nacimiento_bene'=> 'string',
        'fecha_nacimiento_bene'=> 'string',
        'parentesco'=> 'string',
        'porcentaje'=> 'string',
        'nombre_bene2'=> 'string',
        'rfc_b2'=> 'string',
        'domicilio_bene2'=> 'string',
        'lugar_nacimiento_bene2'=> 'string',
        'fecha_nacimiento_bene2'=> 'string',
        'parentesco_bene2'=> 'string',
        'porcentaje2'=> 'string',
        'nombre_bene3'=> 'string',
        'rfc_b3'=> 'string',
        'domicilio_bene3'=> 'string',
        'lugar_nacimiento_bene3'=> 'string',
        'fecha_nacimiento_bene3'=> 'string',
        'parentesco_bene3'=> 'string',
        'porcentaje3'=> 'string',
        'n_beneficiario'=> 'string',
        'genero'=> 'integer',
        'contrato'=> 'string',
        'estatus'=> 'integer',
        'salario_mensual'=> 'string',
        'salario_diario'=> 'string',
        'Vencimiento_contrato' => 'string',
        'Vencimiento_prueba' => 'string',
        'fecha_fin' => 'string',
        'fecha_ingreso' => 'string',
        'nombre_sup'=> 'string',
        'departamento' => 'integer',
        'puesto'=> 'integer',
        'sal_ini_fecha'=> 'string',
        'sal_ini'=> 'string',
        'reviciones'=> 'string',
        'notas'=>'string'
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    
}
