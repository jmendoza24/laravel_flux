<?php

namespace App\Repositories;

use App\Models\trafico;
use App\Repositories\BaseRepository;

/**
 * Class traficoRepository
 * @package App\Repositories
 * @version February 6, 2020, 8:25 pm UTC
*/

class traficoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return trafico::class;
    }
}
