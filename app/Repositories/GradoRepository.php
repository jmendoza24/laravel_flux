<?php

namespace App\Repositories;

use App\Models\Grado;
use App\Repositories\BaseRepository;

/**
 * Class GradoRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:22 am UTC
*/

class GradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'grado',
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
        return Grado::class;
    }
}
