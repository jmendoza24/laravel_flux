<?php

namespace App\Repositories;

use App\Models\TipoEquipo;
use App\Repositories\BaseRepository;

/**
 * Class TipoEquipoRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:18 am UTC
*/

class TipoEquipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'equipo',
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
        return TipoEquipo::class;
    }
}
