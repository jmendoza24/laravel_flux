<?php

namespace App\Repositories;

use App\Models\condiciones;
use App\Repositories\BaseRepository;

/**
 * Class condicionesRepository
 * @package App\Repositories
 * @version September 11, 2019, 3:05 am UTC
*/

class condicionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
        'condicion'
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
        return condiciones::class;
    }
}
