<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'nombres' => $faker->firstName,
        'apellidos'=> $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'nacimiento'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'sexo' => $faker->randomElement(['masculino', 'female']),
        'Npadres'=>$faker->name,
        'miembroActivo' => $faker->boolean,
        'penitencia'    => $faker->boolean,
        'telefono'      => '22322009',
        'municipio_id'     => $faker->numberBetween($min = 1, $max = 262),
        'biblioteca_id'=> '1',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
