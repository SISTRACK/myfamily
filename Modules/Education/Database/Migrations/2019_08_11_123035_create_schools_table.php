<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_type_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('school_types')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('school_category_id')
            ->nullable()
            ->unsigned()
            ->foreign()
            ->refernces('id')
            ->on('school_categories')
            ->delete('restrict')
            ->update('cascade');
            $table->string('name');
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
        Schema::dropIfExists('schools');
    }
}
