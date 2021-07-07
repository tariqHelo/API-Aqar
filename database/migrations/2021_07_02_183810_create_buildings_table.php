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
            $table->foreignId('floor_id')->nullable()->constrained();

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
