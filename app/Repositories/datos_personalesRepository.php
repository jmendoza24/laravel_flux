<?php

namespace App\Repositories;

use App\Models\datos_personales;
use App\Repositories\BaseRepository;

/**
 * Class datos_personalesRepository
 * @package App\Repositories
 * @version January 19, 2021, 5:17 am UTC
*/

class datos_personalesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tel_casa',
        'tel_celular',
        'correo',
        'contacto1_nombre',
        'contacto1_tel_casa',
        'contacto1_tel_celular',
        'contacto1_relacion',
        'contacto2_nombre',
        'contacto2_tel_casa',
        'contacto2_tel_cel',
        'contaco2_relacion'
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
        return datos_personales::class;
    }
}
