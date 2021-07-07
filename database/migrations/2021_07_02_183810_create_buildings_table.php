<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('lag', 5, 2)->nullable()->default(123.45);
            $table->decimal('lat', 5, 2)->nullable()->default(123.45);
            $table->string('aqar_type');

            $table->string('elevator');
            $table->string('elevator_count');

            $table->string('campany');
            $table->integer('campany_phone');

            $table->string('worker');
            $table->integer('phone');
           
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
        Schema::dropIfExists('buildings');
    }
}
 // $table->string('floor_No');

 // $table->string('apartment_number');
 // $table->string('the_number_of_bathrooms');
 // $table->string('the_number_of_halls');
 // $table->string('the_number_of_kitchens');
 // $table->string('the_number_of_stores');
 // $table->string('is_there_a_balcony');
 // $table->string('is_there_a_ready_kitchen');
 // $table->string('are_there_air_conditioners_installed');
 // $table->string('apartment_space');

 // $table->string('electricity_meter_number');
 // $table->string('property_value');
 // $table->string('yearly');
 // $table->string('midterm');
 // $table->string('quarterly');
 // $table->string('monthly');
 // $table->string('additional_details');

 // $table->string('shop_number');
 // $table->string('shop_space');


 // $table->string('is_there_any_water');
 // $table->string('is_there_electricity?');
 // $table->string('is_there_a_bathroom');

 // $table->string('yearly');
 // $table->string('midterm');
 // $table->string('quarterly');
 // $table->string('monthly');
 // $table->string('additional_details');


 // $table->string('image');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
 // $table->string('name');
