<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEaqarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eaqaris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullabel();
            $table->string('phone')->nullabel();
            $table->string('email')->nullabel();
            $table->string('facility_name')->nullabel();
            $table->string('adjective')->nullabel();
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
        Schema::dropIfExists('eaqaris');
    }
}
