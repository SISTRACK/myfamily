<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalReportCollationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_report_collations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id');
            $table->integer('year_id');
            $table->integer('month_id');
            $table->integer('admission')->default(0);
            $table->integer('discharge')->default(0);
            $table->integer('death')->default(0);
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
        Schema::dropIfExists('hospital_report_collations');
    }
}
