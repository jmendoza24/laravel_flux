<?php

namespace App\Repositories;

use App\Models\cat_incidencias;
use App\Repositories\BaseRepository;

/**
 * Class cat_incidenciasRepository
 * @package App\Repositories
 * @version January 21, 2021, 3:27 am UTC
*/

class cat_incidenciasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'incidencia',
        'documento'
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
        return cat_incidencias::class;
    }
}
