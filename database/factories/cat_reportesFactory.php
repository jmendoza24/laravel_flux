<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\cat_reportes;
use Faker\Generator as Faker;

$factory->define(cat_reportes::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'documento' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
