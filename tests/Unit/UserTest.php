<?php

namespace Tests\Unit;

use App\Airport;
use App\Flight;
use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function userHasFlights()
    {
        $user = factory(User::class)->create();
        $airports = factory(Airport::class, 2)->create();

        $flight = factory(Flight::class)->create([
            'departure_airport_id' => $airports[0]->id,
            'arrival_airport_id' => $airports[1]->id
        ]);

        $user->flights()->save($flight);

        $associatedFlight = $user->flights->first();
        $this->assertEquals($associatedFlight->getAttributes(), $flight->getAttributes());
    }
}
