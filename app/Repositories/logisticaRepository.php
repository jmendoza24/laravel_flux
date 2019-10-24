<?php

namespace App\Repositories;

use App\Models\logistica;
use App\Repositories\BaseRepository;

/**
 * Class logisticaRepository
 * @package App\Repositories
 * @version September 4, 2019, 2:00 pm UTC
*/

class logisticaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_producto',
        'telefono_log',
        'correo_log',
        'pais_log',
        'estado_log',
        'municipio_log',
        'calle_log',
        'cp_log',
        'numero_log'
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
        return logistica::class;
    }
}
