<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\equipo_historial;
use Faker\Generator as Faker;

$factory->define(equipo_historial::class, function (Faker $faker) {

    return [
        'historial_tipo' => $faker->randomDigitNotNull,
        'responsable' => $faker->word,
        'descripcion' => $faker->word,
        'vencimiento' => $faker->word,
        'activo' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
