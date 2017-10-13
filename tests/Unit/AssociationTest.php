<?php

namespace Tests\Feature;

use App\Flight;
use Tests\TestCase;

class AssociationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFlightHasAssociatedDepartureAirport()
    {
        $flight = Flight::first();
        $departure = $flight->departureAirport;
        $this->assertNotNull($departure);
    }
}
