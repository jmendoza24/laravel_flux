<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\datos_personales;
use Faker\Generator as Faker;

$factory->define(datos_personales::class, function (Faker $faker) {

    return [
        'tel_casa' => $faker->word,
        'tel_celular' => $faker->word,
        'correo' => $faker->word,
        'contacto1_nombre' => $faker->word,
        'contacto1_tel_casa' => $faker->word,
        'contacto1_tel_celular' => $faker->word,
        'contacto1_relacion' => $faker->word,
        'contacto2_nombre' => $faker->word,
        'contacto2_tel_casa' => $faker->word,
        'contacto2_tel_cel' => $faker->word,
        'contaco2_relacion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
