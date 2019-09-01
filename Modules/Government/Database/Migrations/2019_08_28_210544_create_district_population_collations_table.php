<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictPopulationCollationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_population_collations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id');
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
        Schema::dropIfExists('district_population_collations');
    }
}
