<?php

use Faker\Generator as Faker;

$factory->define(App\Flight::class, function (Faker $faker) {
    return [
        'started_at' => $faker->dateTime()->format("Y-m-d H:i:s"),
        'ended_at' => $faker->dateTime()->format("Y-m-d H:i:s")
    ];
});
