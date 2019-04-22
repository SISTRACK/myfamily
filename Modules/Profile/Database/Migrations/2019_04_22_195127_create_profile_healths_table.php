<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_healths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('desease_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('deseases')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('genotype_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('genotypes')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('blood_group_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('blood_groups')
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
        Schema::dropIfExists('profile_healths');
    }
}
