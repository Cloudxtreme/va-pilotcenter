<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeysForFlightArrivalAndDeparture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("flights", function (Blueprint $table) {
            // Drop the old columns for the ICAO code
            $table->dropColumn("departure");
            $table->dropColumn("arrival");

            // Add new columns for foreign key constraints
            $table->integer("arrival_airport_id")->unsigned()->notNull()->default(0);
            $table->integer("departure_airport_id")->unsigned()->notNull()->default(0);

            // Make the foreign keys
            $table->foreign("arrival_airport_id")->references("id")->on("airports");
            $table->foreign("departure_airport-id")->references("id")->on("airports");
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
            // Drop the keys
            $table->dropForeign("arrival_airport_id");
            $table->dropForeign("departure_airport_id");

            // Drop the columns
            $table->dropColumn("arrival_airport_id");
            $table->dropColumn("departure_airport_id");
        });
    }
}
