<?php

namespace App\Repositories;

use App\Models\tbl_equipos;
use App\Repositories\BaseRepository;

/**
 * Class tbl_equiposRepository
 * @package App\Repositories
 * @version January 10, 2021, 12:20 am UTC
*/

class tbl_equiposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return tbl_equipos::class;
    }
}
