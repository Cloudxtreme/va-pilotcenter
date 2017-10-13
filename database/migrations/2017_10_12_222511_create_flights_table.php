<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            // Add new columns for foreign key constraints
            $table->integer("arrival_airport_id")->unsigned()->notNull()->default(0);
            $table->integer("departure_airport_id")->unsigned()->notNull()->default(0);

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
        Schema::dropIfExists('flights');
    }
}
