<?php

namespace Tests\Feature;

use App\Airport;
use App\Flight;
use App\FlightDatapoint;
use App\User;
use Tests\TestCase;

class FlightTest extends TestCase
{
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

    /**
     * @test
     */
    public function flightBelongsToUser()
    {
        $flight = factory(Flight::class)->make();
        $user = factory(User::class)->create();

        $flight->user()->associate($user);

        $associatedUser = $flight->user;
        $this->assertEquals($associatedUser->getAttributes(), $user->getAttributes());
    }

    /**
     * @test
     */
    public function flightHasDatapoints()
    {
        $flight = factory(Flight::class)->make();
        $datapoints = factory(FlightDatapoint::class, 10)->create()->each(function ($point) use ($flight) {
            $point->flight()->associate($flight);
        });

        foreach ($datapoints as $point) {
            $associatedFlight = $point->flight;
            $this->assertEquals($associatedFlight->getAttributes(), $flight->getAttributes());
        }
    }
}
