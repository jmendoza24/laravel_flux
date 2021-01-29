<?php

namespace App\Repositories;

use App\Models\cat_reportes_medicos;
use App\Repositories\BaseRepository;

/**
 * Class cat_reportes_medicosRepository
 * @package App\Repositories
 * @version January 21, 2021, 3:33 am UTC
*/

class cat_reportes_medicosRepository extends BaseRepository
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
        return cat_reportes_medicos::class;
    }
}
