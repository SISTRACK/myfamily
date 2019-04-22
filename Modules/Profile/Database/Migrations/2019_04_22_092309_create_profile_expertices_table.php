<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileExperticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_expertices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('expertice_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('expertices')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('percentage');
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
        Schema::dropIfExists('profile_expertices');
    }
}
