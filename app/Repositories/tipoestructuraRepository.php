<?php

namespace App\Repositories;

use App\Models\tipoestructura;
use App\Repositories\BaseRepository;

/**
 * Class tipoestructuraRepository
 * @package App\Repositories
 * @version September 11, 2019, 3:11 am UTC
*/

class tipoestructuraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estructura',
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
        return tipoestructura::class;
    }
}
