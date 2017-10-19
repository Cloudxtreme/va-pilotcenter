<?php

use Faker\Generator as Faker;

$factory->define(App\FlightDatapoint::class, function (Faker $faker) {
    return [
        'recorded_at' => $faker->dateTime()->format("Y-m-d H:i:s"),
        'latitude' => round($faker->latitude, 6),
        'longitude' => round($faker->longitude, 6)
    ];
});
