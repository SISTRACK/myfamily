<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosptalLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosptal_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('hospitals')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('town_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('towns')
            ->delete('restrict')
            ->update('cascade');
            $table->string('address');
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
        Schema::dropIfExists('hosptal_locations');
    }
}
