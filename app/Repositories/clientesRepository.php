<?php

namespace App\Repositories;

use App\Models\clientes;
use App\Repositories\BaseRepository;

/**
 * Class clientesRepository
 * @package App\Repositories
 * @version August 27, 2019, 10:32 pm UTC
*/

class clientesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nombre_corto',
        'calle',
        'numero',
        'pais',
        'estado',
        'municipio',
        'cp',
        'id_proveedor',
        'linea',
        'terminopago',
        'compra_nombre',
        'compra_telefono',
        'correo_compra',
        'recepcion_nombre',
        'recepcion_telefono',
        'recepcion_correo',
        'fac_nombre',
        'fac_calle',
        'fac_numero',
        'fac_estado',
        'fac_municipio',
        'fac_pais',
        'fac_cp',
        'doc_nombre',
        'doc_correo',
        'imp_factura',
        'imp_porcentaje',
        'imp_nocertificado',
        'nota_marcado',
        'nota_embarques'
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
        return clientes::class;
    }
}
