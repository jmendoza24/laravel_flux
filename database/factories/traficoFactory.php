<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\trafico;
use Faker\Generator as Faker;

$factory->define(trafico::class, function (Faker $faker) {

    return [
        'id_orden' => $faker->randomDigitNotNull,
        'id_detalle' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
