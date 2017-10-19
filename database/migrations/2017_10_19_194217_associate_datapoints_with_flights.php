<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssociateDatapointsWithFlights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("flight_datapoints", function (Blueprint $table) {
            $table->integer("flight_id")->unsigned()->nullable();
            $table->foreign("flight_id")->references("id")->on("flights");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("flight_datapoints", function (Blueprint $table) {
            $table->dropForeign("flight_datapoints_flight_id_foreign");
            $table->dropColumn("flight_id");
        });
    }
}
