<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned()->foreign()->refernces('id')->on('families')->delete('restrict')->update('cascade');;
            $table->integer('image_id')->unsigned()->foreign()->refernces('id')->on('images')->delete('restrict')->update('cascade');
            $table->integer('status');
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
        Schema::dropIfExists('family_images');
    }
}
