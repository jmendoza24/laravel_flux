<?php

namespace App\Repositories;

use App\Models\ListaMateriales;
use App\Repositories\BaseRepository;

/**
 * Class ListaMaterialesRepository
 * @package App\Repositories
 * @version September 25, 2019, 10:21 pm UTC
*/

class ListaMaterialesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'material',
        'tipo_acero',
        'forma',
        'grado',
        'espesor',
        'ancho',
        'altura',
        'peso_distancia',
        'wide',
        'lenght',
        'weight',
        'precio',
        'peso_pieza',
        'precion_nacional',
        'fecha',
        'num_orden',
        'id_proveedor',
        'molino',
        'pais',
        'colada_numero',
        'fecha_entrega',
        'num_embarque',
        'certificado_mat',
        'ordencompra',
        'remisionprov',
        'reporteprod',
        'resolucionprod' 
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
        return ListaMateriales::class;
    }
}
