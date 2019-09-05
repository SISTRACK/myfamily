<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownInfectionReportCollationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('town_infection_report_collations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('town_id');
            $table->integer('infection_id');
            $table->integer('year_id');
            $table->integer('month_id');
            $table->integer('infection');
            $table->integer('monthly_infection');
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
        Schema::dropIfExists('town_infection_report_collations');
    }
}
