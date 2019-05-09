<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('access_to_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->refernces('id')
            ->on('profiles')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('profile_accesses');
    }
}
