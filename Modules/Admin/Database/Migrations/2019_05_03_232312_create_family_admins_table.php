<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('family_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('families')
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
        Schema::dropIfExists('family_admins');
    }
}
