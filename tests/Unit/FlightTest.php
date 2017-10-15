<?php

namespace Tests\Feature;

use App\Airport;
use App\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BaseTest;

class FlightTest extends BaseTest
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function flightHasArrivalAndDepartureAirport()
    {
        $flight = factory(Flight::class)->make();
        $airports = factory(Airport::class, 2)->create();

        $flight->departureAirport()->associate($airports[0]);
        $flight->arrivalAirport()->associate($airports[1]);

        $departure = $flight->departureAirport;
        $arrival = $flight->arrivalAirport;
        $this->assertEquals($departure->getAttributes(), $airports[0]->getAttributes());
        $this->assertEquals($arrival->getAttributes(), $airports[1]->getAttributes());
    }
}
