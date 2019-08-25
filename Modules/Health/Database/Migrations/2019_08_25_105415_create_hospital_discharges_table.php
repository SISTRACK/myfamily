<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalDischargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_discharges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_admission_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('hospital_admissions')
            ->delete('restrict')
            ->update('cascade');
            $table->string('is_active')->default(1);
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
        Schema::dropIfExists('hospital_discharges');
    }
}
