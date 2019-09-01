<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaPopulationCollationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_population_collations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id');
            $table->integer('year_id');
            $table->integer('month_id');
            $table->integer('population');
            $table->integer('monthly_population');
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
        Schema::dropIfExists('area_population_collations');
    }
}
