<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\cat_incidencias;
use Faker\Generator as Faker;

$factory->define(cat_incidencias::class, function (Faker $faker) {

    return [
        'incidencia' => $faker->word,
        'documento' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
