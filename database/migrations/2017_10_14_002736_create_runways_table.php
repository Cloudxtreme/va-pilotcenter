<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runways', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string("name", 3); // "09R", "18"
            $table->integer("length"); // In metres
            $table->integer("elevation"); // In feet
            $table->float("slope"); // In percent
            $table->integer("width"); // In metres
            $table->enum("type", ["asphalt", "grass"])->default("asphalt"); //

            $table->integer("airport_id")->unsigned();
            $table->foreign("airport_id")->references("id")->on("airports");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runways');
    }
}
