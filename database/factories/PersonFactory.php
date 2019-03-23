<?php

use Faker\Generator as Faker;

$factory->define(\App\Person::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male','female']);
    $lastNamleSuffix = $gender === 'female' ? 'a' : '';
    return [
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->lastName.$lastNamleSuffix,
        'middle_name' => $faker->middleName($gender),
        'gender' => $gender,
        'salary' => $faker->numberBetween(1000, 10000),
    ];
});
