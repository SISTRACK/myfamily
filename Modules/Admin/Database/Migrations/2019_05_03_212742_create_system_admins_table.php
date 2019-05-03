<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('admin_status_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('admin_statuses')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('state_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('states')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('lga_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('lgas')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('town_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('towns')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('area_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('areas')
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
        Schema::dropIfExists('system_admins');
    }
}
