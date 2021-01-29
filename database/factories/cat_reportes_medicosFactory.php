<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\cat_reportes_medicos;
use Faker\Generator as Faker;

$factory->define(cat_reportes_medicos::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'documento' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
