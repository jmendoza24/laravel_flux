<?php

namespace App\Repositories;

use App\Models\cat_reportes;
use App\Repositories\BaseRepository;

/**
 * Class cat_reportesRepository
 * @package App\Repositories
 * @version January 21, 2021, 3:32 am UTC
*/

class cat_reportesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
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
        return cat_reportes::class;
    }
}
