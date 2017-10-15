<?php

namespace Tests\Feature;

use App\Airport;
use App\Flight;
use Tests\TestCase;

class FlightTest extends TestCase
{
    /**
     * @test
     */
    public function flightHasDepartureAirport()
    {
        $flight = factory(Flight::class)->make();

        $airport = factory(Airport::class)->make();
        $flight->departureAirport()->associate($airport);

        $departure = $flight->departureAirport;
        $this->assertEquals($departure->getAttributes(), $airport->getAttributes());
    }
}
