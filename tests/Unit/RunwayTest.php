<?php

namespace Tests\Unit;

use App\Airport;
use App\Runway;
use Tests\TestCase;

class RunwayTest extends TestCase
{
    /**
     * @test
     */
    public function runwayBelongsToAirport()
    {
        $airport = factory(Airport::class)->make();
        $runway = factory(Runway::class)->make();

        $runway->airport()->associate($airport);

        $associatedAirport = $runway->airport;
        $this->assertEquals($associatedAirport->getAttributes(), $airport->getAttributes());
    }
}
