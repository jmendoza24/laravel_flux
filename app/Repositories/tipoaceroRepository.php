<?php

namespace App\Repositories;

use App\Models\tipoacero;
use App\Repositories\BaseRepository;

/**
 * Class tipoaceroRepository
 * @package App\Repositories
 * @version September 11, 2019, 3:10 am UTC
*/

class tipoaceroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'acero',
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
        return tipoacero::class;
    }
}
