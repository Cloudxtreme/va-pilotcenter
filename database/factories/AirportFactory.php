<?php

use Faker\Generator as Faker;

$factory->define(App\Airport::class, function (Faker $faker) {
    $city = $faker->city;
    return [
        'name' => $city,
        'icao' => substr($city, 0, 4),
        'iata' => substr($city, 0, 3)
    ];
});
