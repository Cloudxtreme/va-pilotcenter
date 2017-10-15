<?php

use Faker\Generator as Faker;

$factory->define(App\Airport::class, function (Faker $faker) {
    $city = $faker->city;
    return [
        'name' => $city,
        'icao' => strtoupper(substr($city, 0, 4)),
        'iata' => strtoupper(substr($city, 0, 3))
    ];
});
