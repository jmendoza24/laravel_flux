<?php

namespace App\Repositories;

use App\Models\Subprocesos;
use App\Repositories\BaseRepository;

/**
 * Class SubprocesosRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:13 am UTC
*/

class SubprocesosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idproceso',
        'subproceso',
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
        return Subprocesos::class;
    }
}
