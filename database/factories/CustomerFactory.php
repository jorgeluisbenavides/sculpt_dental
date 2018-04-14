<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {

    return [
        'folio'         => rand(1,30),
        'name'          => $faker->name,
        'last_name_one' => $faker->lastname,
        'last_name_two' => $faker->lastname,
        'address'       => $faker->streetAddress,
        'references'    => $faker->address,
        'age'           => rand(1,99),
        'cell_phone'    => $faker->tollFreePhoneNumber,
        'home_phone'    => $faker->tollFreePhoneNumber,
        'sex'           => $faker->randomElement(['Masculino','Femenino']),
        'civil_state'   => $faker->randomElement(['Soltero','Casado','Viudo']),
        'img_name'      => $faker->imageUrl($width = 400, $height=400),
        'status'        => $faker->randomElement(['Activo','Inactivo']),    
        'occupation_id' => rand(1,3),
    ];

});