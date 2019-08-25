<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_type_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('hospital_types')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('hospital_category_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('hospital_categories')
            ->delete('restrict')
            ->update('cascade');
            $table->string('name');
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
        Schema::dropIfExists('hospitals');
    }
}
