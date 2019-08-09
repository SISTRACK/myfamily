<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('roles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('state_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('states')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('court_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('courts')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('police_station_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('police_stations')
            ->delete('restrict')
            ->update('cascade');;
            $table->integer('profile_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('gender_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->references('id')
            ->on('genders')
            ->delete('restrict')
            ->update('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->string('email');
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
        Schema::dropIfExists('securities');
    }
}
