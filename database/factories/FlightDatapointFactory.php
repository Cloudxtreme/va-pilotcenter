<?php

use Faker\Generator as Faker;

$factory->define(App\FlightDatapoint::class, function (Faker $faker) {
    return [
        'recorded_at' => $faker->dateTime(),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
