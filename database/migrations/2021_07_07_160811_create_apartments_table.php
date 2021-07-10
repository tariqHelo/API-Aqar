<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('apartment_number');
            $table->integer('apartment_space');
            $table->integer('the_number_of_rooms');
            $table->integer('the_number_of_halls');
            $table->integer('the_number_of_kitchens');
            $table->integer('the_number_of_bathrooms');
            $table->integer('the_number_of_stores');
            $table->boolean('electricity_service');
            $table->boolean('is_there_a_balcony');
            $table->boolean('is_there_a_ready_kitchen')->nullable();
            $table->boolean('are_there_air_conditioners_installed')->nullable();
            $table->integer('price');
            $table->integer('property_value')->nullable();
            $table->integer('electricity_meter_number');
            $table->integer('duration');
            $table->longText('additional_details');
            $table->string('icon');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
