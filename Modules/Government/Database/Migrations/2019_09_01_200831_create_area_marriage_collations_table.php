<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaMarriageCollationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_marriage_collations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id');
            $table->integer('year_id');
            $table->integer('month_id');
            $table->integer('marriage');
            $table->integer('monthly_marriage');
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
        Schema::dropIfExists('area_marriage_collations');
    }
}
