<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\cotizaciones;
use Faker\Generator as Faker;

$factory->define(cotizaciones::class, function (Faker $faker) {

    return [
        'fecha' => $faker->word,
        'cliente' => $faker->randomDigitNotNull,
        'numero_parte' => $faker->word,
        'descripcion' => $faker->text,
        'dibujo' => $faker->randomDigitNotNull,
        'cantidad' => $faker->randomDigitNotNull,
        'costo' => $faker->word,
        'precio_usd' => $faker->word,
        'id_notas' => $faker->randomDigitNotNull,
        'tiempo' => $faker->randomDigitNotNull,
        'income' => $faker->randomDigitNotNull,
        'termino_pago' => $faker->word,
        'vendedor' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
