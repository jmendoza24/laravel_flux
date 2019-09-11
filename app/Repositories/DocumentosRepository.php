<?php

namespace App\Repositories;

use App\Models\Documentos;
use App\Repositories\BaseRepository;

/**
 * Class DocumentosRepository
 * @package App\Repositories
 * @version September 11, 2019, 3:04 am UTC
*/

class DocumentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'documento',
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
        return Documentos::class;
    }
}
