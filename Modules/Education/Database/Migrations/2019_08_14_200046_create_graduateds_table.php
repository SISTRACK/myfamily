<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraduatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduateds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admitted_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('admitteds')
            ->delete('restrict')
            ->update('cascade');
            $table->string('year');
            $table->text('certificate')->nullable();
            $table->text('dipline')->nullable();
            $table->text('class_honor')->nullable();
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
        Schema::dropIfExists('graduateds');
    }
}
