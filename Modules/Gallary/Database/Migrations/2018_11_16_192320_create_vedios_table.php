<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vedios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vedio');
            $table->integer('album_id')->unsigned()->foreign()->refernces('id')->on('albums')->delete('restrict')->update('cascade');;
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
        Schema::dropIfExists('vedios');
    }
}
