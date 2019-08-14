<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmittedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admitteds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('schools')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('profile_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->string('year');
            $table->string('adm_no')->nullable();
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
        Schema::dropIfExists('admitteds');
    }
}
