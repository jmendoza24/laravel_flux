<?php

namespace App\Repositories;

use App\Models\ordenes_compra;
use App\Repositories\BaseRepository;

/**
 * Class ordenes_compraRepository
 * @package App\Repositories
 * @version October 18, 2019, 7:36 pm UTC
*/

class ordenes_compraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_cotizacion',
        'cliente',
        'notas',
        'income',
        'termino_pago',
        'vendedor',
        'fecha'
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
        return ordenes_compra::class;
    }
}
