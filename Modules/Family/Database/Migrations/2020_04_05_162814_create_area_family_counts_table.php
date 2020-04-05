<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaFamilyCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_family_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('families')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('area_id')
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('areas')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('count')->default(1);
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
        Schema::dropIfExists('area_family_counts');
    }
}
