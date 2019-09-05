<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictInfectionReportCollationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_infection_report_collations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id');
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
        Schema::dropIfExists('district_infection_report_collations');
    }
}
