<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlightStartAndEnd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("flights", function (Blueprint $table) {
            $table->dateTime("started_at")->nullable();
            $table->dateTime("ended_at")->nullable();
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
            $table->dropColumn("started_at");
            $table->dropColumn("ended_at");
        });
    }
}
