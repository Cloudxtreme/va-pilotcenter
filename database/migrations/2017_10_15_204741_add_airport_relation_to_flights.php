<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAirportRelationToFlights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("flights", function (Blueprint $table) {
            // Make the foreign keys
            $table->foreign("arrival_airport_id")->references("id")->on("airports");
            $table->foreign("departure_airport_id")->references("id")->on("airports");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("flights", function (Blueprint $table) {
            $table->dropForeign("flights_arrival_airport_id_foreign");
            $table->dropForeign("flights_departure_airport_id_foreign");
        });
    }
}
