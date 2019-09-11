<?php

namespace App\Repositories;

use App\Models\Actividades;
use App\Repositories\BaseRepository;

/**
 * Class ActividadesRepository
 * @package App\Repositories
 * @version September 11, 2019, 2:58 am UTC
*/

class ActividadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'actividad',
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
        return Actividades::class;
    }
}
