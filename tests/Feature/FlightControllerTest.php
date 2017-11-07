<?php

namespace Tests\Feature;

use App\Airport;
use App\Flight;
use App\User;
use Auth;
use Tests\TestCase;

class FlightControllerTest extends TestCase
{
    /**
     * @test
     */
    public function controllerDisplaysFlightsOfCurrentUser()
    {
        $user = factory(User::class)->create();
        Auth::setUser($user);

        $airports = factory(Airport::class, 2)->create();
        $flight = factory(Flight::class)->create([
            'arrival_airport_id' => $airports[0],
            'departure_airport_id' => $airports[1],
        ]);
        $flight->user()->associate($user);
        $flight->save();

        $arrivalName = $airports[0]->name;
        $departureName = $airports[1]->name;

        $response = $this->get("/flights");
        $response->assertSee($arrivalName);
        $response->assertSee($departureName);
    }

    /**
     * @test
     */
    public function controllerCanDeleteFlightOfCurrentUser()
    {
        $user = factory(User::class)->create();
        Auth::setUser($user);

        $airports = factory(Airport::class, 2)->create();
        $flight = factory(Flight::class)->create([
            'arrival_airport_id' => $airports[0],
            'departure_airport_id' => $airports[1],
        ]);
        $flight->user()->associate($user);
        $flight->save();

        $arrivalName = $airports[0]->name;
        $departureName = $airports[1]->name;

        $response = $this->delete("/flights/" . $flight->id);
        $response->assertStatus(200);

        $response = $this->get("/flights");
        $response->assertDontSee($arrivalName);
        $response->assertDontSee($departureName);
    }
}
