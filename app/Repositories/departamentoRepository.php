<?php

namespace App\Repositories;

use App\Models\departamento;
use App\Repositories\BaseRepository;

/**
 * Class departamentoRepository
 * @package App\Repositories
 * @version January 17, 2021, 11:42 pm UTC
*/

class departamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'departamento'
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
        return departamento::class;
    }
}
