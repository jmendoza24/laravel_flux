<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ListaMateriales;
use Faker\Generator as Faker;

$factory->define(ListaMateriales::class, function (Faker $faker) {

    return [
        'material' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
