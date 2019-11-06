<?php

namespace App\Repositories;

use App\Models\proveedores;
use App\Repositories\BaseRepository;

/**
 * Class proveedoresRepository
 * @package App\Repositories
 * @version August 27, 2019, 9:43 pm UTC
*/

class proveedoresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'direccion',
        'pais',
        'estado',
        'municipio',
        'cp',
        'rfc',
        'credito',
        'telefono',
        'correo',
        'puesto',
        'nombre_contacto'
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
        return proveedores::class;
    }
}
