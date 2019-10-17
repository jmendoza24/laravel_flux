<?php

namespace App\Repositories;

use App\Models\cotizaciones;
use App\Repositories\BaseRepository;

/**
 * Class cotizacionesRepository
 * @package App\Repositories
 * @version September 20, 2019, 3:18 am UTC
*/

class cotizacionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'producto',
        'fecha',
        'cliente',
        'id_notas',
        'tiempo',
        'income',
        'termino_pago',
        'vendedor'
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
        return cotizaciones::class;
    }
}
