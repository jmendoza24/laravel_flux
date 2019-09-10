<?php

namespace App\Repositories;

use App\Models\IncomeTerms;
use App\Repositories\BaseRepository;

/**
 * Class IncomeTermsRepository
 * @package App\Repositories
 * @version September 10, 2019, 4:25 am UTC
*/

class IncomeTermsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'income',
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
        return IncomeTerms::class;
    }
}
