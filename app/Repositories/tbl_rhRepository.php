<?php

namespace App\Repositories;

use App\Models\tbl_rh;
use App\Repositories\BaseRepository;

/**
 * Class tbl_rhRepository
 * @package App\Repositories
 * @version January 17, 2021, 6:36 pm UTC
*/

class tbl_rhRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tbl_rh::class;
    }
}
