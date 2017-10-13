<?php

use App\Airport;
use App\Flight;
use App\Runway;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eddh = new Airport;
        $eddh->name = "Hamburg Airport";
        $eddh->icao = "EDDH";
        $eddh->iata = "HAM";
        $eddh->save();

        $eddh33 = new Runway;
        $eddh33->name = "33";
        $eddh33->length = 3666;
        $eddh33->elevation = 38;
        $eddh33->slope = 0.0;
        $eddh33->width = 46;
        $eddh33->airport()->associate($eddh);
        $eddh33->save();

        $eddm = new Airport;
        $eddm->name = "München Airport";
        $eddm->icao = "EDDM";
        $eddm->iata = "MUC";
        $eddm->save();

        $flight1 = new Flight;
        $flight1->departureAirport()->associate($eddh);
        $flight1->arrivalAirport()->associate($eddm);
        $flight1->save();

        $flight2 = new Flight;
        $flight2->departureAirport()->associate($eddm);
        $flight2->arrivalAirport()->associate($eddh);
        $flight2->save();
    }
}
