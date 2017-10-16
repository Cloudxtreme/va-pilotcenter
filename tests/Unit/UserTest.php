<?php

namespace Tests\Unit;

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
        $user = factory(User::class)->make();
        $flights = factory(Flight::class, 2)->make()->each(function ($flight) use ($user) {
            $flight->user()->associate($user);
        });

        foreach ($flights as $flight) {
            $associatedUser = $flight->user;
            $this->assertEquals($associatedUser->getAttributes(), $user->getAttributes());
        }
    }
}
