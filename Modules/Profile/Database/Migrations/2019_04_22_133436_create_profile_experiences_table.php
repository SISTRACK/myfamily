<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('experience_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('experiences')
            ->delete('restrict')
            ->update('cascade');
            $table->string('about');
            $table->string('address');
            $table->integer('from');
            $table->integer('to');
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
        Schema::dropIfExists('profile_experiences');
    }
}
