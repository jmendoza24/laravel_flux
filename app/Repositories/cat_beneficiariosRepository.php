<?php

namespace App\Repositories;

use App\Models\cat_beneficiarios;
use App\Repositories\BaseRepository;

/**
 * Class cat_beneficiariosRepository
 * @package App\Repositories
 * @version January 20, 2021, 4:33 am UTC
*/

class cat_beneficiariosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'rfc',
        'domicilio',
        'lugar_nac',
        'fecha_nacimiento',
        'parentesco',
        'porcentage'
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
        return cat_beneficiarios::class;
    }
}
