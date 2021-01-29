<?php

namespace App\Repositories;

use App\Models\puestos;
use App\Repositories\BaseRepository;

/**
 * Class puestosRepository
 * @package App\Repositories
 * @version January 17, 2021, 7:33 pm UTC
*/

class puestosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'puesto'
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
        return puestos::class;
    }
}
