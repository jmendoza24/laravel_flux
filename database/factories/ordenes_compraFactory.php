<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ordenes_compra;
use Faker\Generator as Faker;

$factory->define(ordenes_compra::class, function (Faker $faker) {

    return [
        'id_cotizacion' => $faker->randomDigitNotNull,
        'cliente' => $faker->randomDigitNotNull,
        'notas' => $faker->word,
        'income' => $faker->randomDigitNotNull,
        'termino_pago' => $faker->randomDigitNotNull,
        'vendedor' => $faker->randomDigitNotNull,
        'fecha' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
