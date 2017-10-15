<?php

namespace Tests\Unit;

use App\Airport;
use App\Runway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BaseTest;

class AirportTest extends BaseTest
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function airportHasRunway()
    {
        $airport = factory(Airport::class)->create();
        $runway = factory(Runway::class)->make();

        $airport->runways()->save($runway);

        $mainRunway = $airport->runways->first();
        $this->assertEquals($mainRunway->getAttributes(), $runway->getAttributes());
    }
}
