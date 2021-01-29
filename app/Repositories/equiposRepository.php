<?php

namespace App\Repositories;

use App\Models\equipos;
use App\Repositories\BaseRepository;

/**
 * Class equiposRepository
 * @package App\Repositories
 * @version August 27, 2019, 9:04 pm UTC
*/

class equiposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'marca',
        'modelo',
        'serie',
        'pedimento',
        'idequipo',
        'tipo',
        'base',
        'calibracion',
        'mantenimiento',
        'correctivo',
        'preventivo',
        'planta',
        'activo'
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
        return equipos::class;
    }
}
