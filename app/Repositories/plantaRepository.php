<?php

namespace App\Repositories;

use App\Models\planta;
use App\Repositories\BaseRepository;

/**
 * Class plantaRepository
 * @package App\Repositories
 * @version August 23, 2019, 3:40 am UTC
*/

class plantaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'id_planta',
        'direccion',
        'colonia',
        'municipio',
        'estado',
        'pais',
        'cp',
        'rfc',
        'telefono',
        'correo',
        'puesto'
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
        return planta::class;
    }
}
