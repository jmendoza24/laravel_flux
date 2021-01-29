<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\cat_beneficiarios;
use Faker\Generator as Faker;

$factory->define(cat_beneficiarios::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'rfc' => $faker->word,
        'domicilio' => $faker->word,
        'lugar_nac' => $faker->word,
        'fecha_nacimiento' => $faker->word,
        'parentesco' => $faker->randomDigitNotNull,
        'porcentage' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
