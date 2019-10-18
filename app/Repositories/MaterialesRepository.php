<?php

namespace App\Repositories;

use App\Models\Materiales;
use App\Repositories\BaseRepository;

/**
 * Class MaterialesRepository
 * @package App\Repositories
 * @version September 18, 2019, 5:27 pm UTC
*/

class MaterialesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'material',
        'tipo_acero',
        'forma',
        'planta',
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
        'resolucionprod',
        'cantidad',
        'metros' 
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
        return Materiales::class;
    }
}
