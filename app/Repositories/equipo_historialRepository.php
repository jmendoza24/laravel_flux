<?php

namespace App\Repositories;

use App\Models\equipo_historial;
use App\Repositories\BaseRepository;

/**
 * Class equipo_historialRepository
 * @package App\Repositories
 * @version September 6, 2019, 9:11 pm UTC
*/

class equipo_historialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'historial_tipo',
        'responsable',
        'descripcion',
        'vencimiento',
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
        return equipo_historial::class;
    }
}
