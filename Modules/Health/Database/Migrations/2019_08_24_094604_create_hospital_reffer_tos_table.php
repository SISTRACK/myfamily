<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalRefferTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_reffer_tos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_report_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('medical_reports')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('reffer_from_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('hospitals')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('reffer_to_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('hospitals')
            ->delete('restrict')
            ->update('cascade');
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
        Schema::dropIfExists('hospital_reffer_tos');
    }
}
