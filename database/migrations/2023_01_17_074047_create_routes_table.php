<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('from_station_id');
            $table->unsignedBigInteger('to_station_id');
            $table->unsignedBigInteger('bus_id');
            $table->timestamp("timing");

            $table->timestamps();
        });

        Schema::table('routes', function ($table) {
            $table->foreign('from_station_id')->references('id')->on('Stations'); //->cascadeOnDelete();
            $table->foreign('to_station_id')->references('id')->on('Stations'); //->cascadeOnDelete();
            $table->foreign('bus_id')->references('id')->on('Buses'); //->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
};
