<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\dibujos_productos;
use Faker\Generator as Faker;

$factory->define(dibujos_productos::class, function (Faker $faker) {

    return [
        'id_producto' => $faker->randomDigitNotNull,
        'dibujo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
