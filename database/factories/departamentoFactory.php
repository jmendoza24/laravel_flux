<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\departamento;
use Faker\Generator as Faker;

$factory->define(departamento::class, function (Faker $faker) {

    return [
        'departamento' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
