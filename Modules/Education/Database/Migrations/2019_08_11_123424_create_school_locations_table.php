<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('schools')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('town_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('towns')
            ->delete('restrict')
            ->update('cascade');
            $table->text('address');
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
        Schema::dropIfExists('school_locations');
    }
}
