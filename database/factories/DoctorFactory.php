<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'last_name_one' => $faker->text(20),
        'last_name_two' => $faker->text(20),
        'speciality' => $faker->text(100),
        'professional_license' => $faker->text(100),
        'graduate_university' => $faker->text(100),
        'sex' => $faker->randomElement(['MALE','FEMALE']),
        'cell_phone'  => rand(1,30), //crea dato aleatorio
        'home_phone'  => rand(1,30), //crea dato aleatorio
        'img_name' => $faker->imageUrl($width = 1200, $height=400),
    ];
});
