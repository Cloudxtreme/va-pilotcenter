<?php

use Faker\Generator as Faker;

$factory->define(App\Runway::class, function (Faker $faker) {
    return [
        'name' => sprintf("%02d", $faker->numberBetween(1, 36)),
        'length' => $faker->numberBetween(1000, 4000),
        'elevation' => $faker->numberBetween(0, 700),
        'slope' => $faker->randomFloat(2, 0, 1),
        'width' => $faker->numberBetween(50, 200),
        'type' => $faker->randomElement(['asphalt', 'grass'])
    ];
});
