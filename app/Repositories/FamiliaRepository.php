<?php

namespace App\Repositories;

use App\Models\Familia;
use App\Repositories\BaseRepository;

/**
 * Class FamiliaRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:17 am UTC
*/

class FamiliaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'familia',
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
        return Familia::class;
    }
}
