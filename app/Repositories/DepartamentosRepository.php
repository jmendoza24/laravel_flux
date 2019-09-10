<?php

namespace App\Repositories;

use App\Models\Departamentos;
use App\Repositories\BaseRepository;

/**
 * Class DepartamentosRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:15 am UTC
*/

class DepartamentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_familia',
        'departamento',
        'descripcion'
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
        return Departamentos::class;
    }
}
