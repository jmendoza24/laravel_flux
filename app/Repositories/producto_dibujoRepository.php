<?php

namespace App\Repositories;

use App\Models\producto_dibujo;
use App\Repositories\BaseRepository;

/**
 * Class producto_dibujoRepository
 * @package App\Repositories
 * @version September 11, 2019, 3:14 am UTC
*/

class producto_dibujoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_producto',
        'dibujo',
        'fecha',
        'revision',
        'tiempo_entrega'
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
        return producto_dibujo::class;
    }
}
