<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tbl_rh;
use Faker\Generator as Faker;

$factory->define(tbl_rh::class, function (Faker $faker) {

    return [
        'num_empleado' => $faker->word,
        'nombre' => $faker->word,
        'direccion' => $faker->text,
        'lugar_nacimiento' => $faker->word,
        'fecha_nacimiento' => $faker->word,
        'grado_escolaridad' => $faker->word,
        'edo_civil' => $faker->randomDigitNotNull,
        'religion' => $faker->randomDigitNotNull,
        'imss' => $faker->word,
        'doc_imss' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
