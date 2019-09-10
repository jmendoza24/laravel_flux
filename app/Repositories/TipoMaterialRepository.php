<?php

namespace App\Repositories;

use App\Models\TipoMaterial;
use App\Repositories\BaseRepository;

/**
 * Class TipoMaterialRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:19 am UTC
*/

class TipoMaterialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'material',
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
        return TipoMaterial::class;
    }
}
