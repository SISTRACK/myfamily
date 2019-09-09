<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictSchoolReportCollationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_school_report_collations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id');
            $table->integer('year_id');
            $table->integer('admission')->default(0);
            $table->integer('graduation')->default(0);
            $table->integer('report')->default(0);
            $table->integer('yearly_admission')->default(0);
            $table->integer('yearly_graduation')->default(0);
            $table->integer('yearly_report')->default(0);
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
        Schema::dropIfExists('district_school_report_collations');
    }
}
