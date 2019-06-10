<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtendFamilyMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extend_family_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned()->foreign()->refernces('id')->on('families')->delete('restrict')->update('cascade');
            $table->integer('user_message_id')->unsigned()->foreign()->refernces('id')->on('user_messages')->delete('restrict')->update('cascade');
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
        Schema::dropIfExists('extend_family_messages');
    }
}
