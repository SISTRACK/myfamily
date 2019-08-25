<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_admissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('doctor_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('doctors')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('diagnose_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('diagnoses')
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
        Schema::dropIfExists('hospital_admissions');
    }
}
