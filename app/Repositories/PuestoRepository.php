<?php

namespace App\Repositories;

use App\Models\Puesto;
use App\Repositories\BaseRepository;

/**
 * Class PuestoRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:14 am UTC
*/

class PuestoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'puesto',
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
        return Puesto::class;
    }
}
