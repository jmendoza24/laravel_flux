<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actividades
 * @package App\Models
 * @version September 11, 2019, 2:58 am UTC
 *
 * @property string actividad
 * @property string descripcion
 */
class Trafico_flete extends Model
{

    public $table = 'traficos_fletes';
    
	public $fillable = [
	        'agencia_mx'     ,
			'no_plataforma'  ,
			'placas'         ,
			'pais_orige'     ,
			'largo'          ,
			'scac'           ,
			'caat'           ,
			'no_referencia'  ,
			'entrada_camion' ,
			'salida_camion'  ,
			'arancelaria_usa',
			'fecha_entrega'  ,
			'tipo_cambio'    ,
			'arancelaria_mx' ,
			'id_trafico'
	    ];


    
}

