<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('users')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('gender_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('gender')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('marital_status_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('marital_statuses')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('life_status_id')->unsigned()
            ->default(1)
            ->foreign()
            ->refernces('id')
            ->on('life_statuses')
            ->delete('restrict')
            ->update('cascade');;
            $table->integer('health_id')->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('user_healths')
            ->delete('restrict')
            ->update('cascade');;
            $table->integer('is_active')->default(1);
            $table->integer('family_id')->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('families')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('image_id')->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('images')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('religion_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('religions')
            ->delete('restrict')
            ->update('cascade');
            $table->string('about_me')
            ->nullable()
            ->default('MY short Biography');
            $table->string('date_of_birth')->default('Not Available');
            $table->string('FID')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
