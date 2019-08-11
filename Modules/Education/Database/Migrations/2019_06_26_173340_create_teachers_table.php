<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('roles')
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
            $table->integer('state_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('states')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('school_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('schools')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('gender_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('genders')
            ->delete('restrict')
            ->update('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('teachers');
    }
}
