<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admitted_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('admitteds')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('school_report_type_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('school_report_types')
            ->delete('restrict')
            ->update('cascade');
            $table->text('about_report');
            $table->text('evidence')->nullable();
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
        Schema::dropIfExists('school_reports');
    }
}
