<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\catalogo_forma;
use Faker\Generator as Faker;

$factory->define(catalogo_forma::class, function (Faker $faker) {

    return [
        'id_forma' => $faker->randomDigitNotNull,
        'valor' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
