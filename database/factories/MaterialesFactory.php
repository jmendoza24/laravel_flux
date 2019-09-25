<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Materiales;
use Faker\Generator as Faker;

$factory->define(Materiales::class, function (Faker $faker) {

    return [
        'tipo_acero' => $faker->randomDigitNotNull,
        'forma' => $faker->randomDigitNotNull,
        'grado' => $faker->randomDigitNotNull,
        'espesor' => $faker->word,
        'ancho' => $faker->word,
        'altura' => $faker->word,
        'peso_distancia' => $faker->word,
        'wide' => $faker->word,
        'lenght' => $faker->word,
        'weight' => $faker->word,
        'precio' => $faker->word,
        'peso_pieza' => $faker->word,
        'precion_nacional' => $faker->word,
        'fecha' => $faker->word,
        'num_orden' => $faker->word,
        'id_proveedor' => $faker->randomDigitNotNull,
        'molino' => $faker->word,
        'pais' => $faker->word,
        'colada_numero' => $faker->randomDigitNotNull,
        'fecha_entrega' => $faker->word,
        'num_embarque' => $faker->word,
        'certificado_mat' => $faker->text,
        'ordencompra' => $faker->text,
        'remisionprov' => $faker->text,
        'reporteprod' => $faker->text,
        'resolucionprod' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')

    ];
});
