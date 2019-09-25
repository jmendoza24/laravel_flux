<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\producto_materiales;
use Faker\Generator as Faker;

$factory->define(producto_materiales::class, function (Faker $faker) {

    return [
        'id_producto' => $faker->randomDigitNotNull,
        'id_material' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
