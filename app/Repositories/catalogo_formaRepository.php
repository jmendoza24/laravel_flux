<?php

namespace App\Repositories;

use App\Models\catalogo_forma;
use App\Repositories\BaseRepository;

/**
 * Class catalogo_formaRepository
 * @package App\Repositories
 * @version November 6, 2019, 6:27 pm UTC
*/

class catalogo_formaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_forma',
        'columna',
        'valor'
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
        return catalogo_forma::class;
    }
}
