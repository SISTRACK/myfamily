<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->foreign()->refernces('id')->on('users')->delete('restrict')->update('cascade');
            $table->integer('admin_id')->unsigned()->foreign()->refernces('id')->on('admins')->delete('restrict')->update('cascade');
            $table->integer('tribe_id')->unsigned()->foreign()->refernces('id')->on('tribes')->delete('restrict')->update('cascade');
            $table->integer('location_id')->unsigned()->foreign()->refernces('id')->on('locations')->delete('restrict')->update('cascade');
            $table->char('name')->unique();
            $table->string('title');
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
        Schema::dropIfExists('families');
    }
}
