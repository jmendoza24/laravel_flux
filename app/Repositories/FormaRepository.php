<?php

namespace App\Repositories;

use App\Models\Forma;
use App\Repositories\BaseRepository;

/**
 * Class FormaRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:24 am UTC
*/

class FormaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'forma',
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
        return Forma::class;
    }
}
