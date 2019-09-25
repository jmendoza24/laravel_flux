<?php

namespace App\Repositories;

use App\Models\Procesos;
use App\Repositories\BaseRepository;

/**
 * Class ProcesosRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:12 am UTC
*/

class ProcesosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'procesos',
        'descripcion',
        'horas'
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
        return Procesos::class;
    }
}
