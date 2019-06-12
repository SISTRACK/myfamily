<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('audio');
            $table->integer('album_id')
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('albums')
            ->delete('restrict')
            ->update('cascade');
            $table->string('title')->default('audio title');
            $table->string('description')->default('audio description');
            $table->string('published')->nullable();
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
        Schema::dropIfExists('audio');
    }
}
