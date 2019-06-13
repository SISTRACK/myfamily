<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_albums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('families')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('profile_id')
            ->unsigned()
            ->foreign()
            ->nullable()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('album_id')
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('albums')
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
        Schema::dropIfExists('access_albums');
    }
}
