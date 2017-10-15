<?php

namespace Tests\Unit;

use App\Airport;
use App\Flight;
use App\FlightDatapoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BaseTest;

class FlightDatapointTest extends BaseTest
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function datapointBelongsToFlight()
    {
        $flight = factory(Flight::class)->make();
        $airports = factory(Airport::class, 2)->create();

        $flight->departureAirport()->associate($airports[0]);
        $flight->arrivalAirport()->associate($airports[1]);

        $datapoint = factory(FlightDatapoint::class)->create();
        $datapoint->flight()->associate($flight);

        $associatedFlight = $datapoint->flight;
        $this->assertEquals($associatedFlight->getAttributes(), $flight->getAttributes());
    }
}
