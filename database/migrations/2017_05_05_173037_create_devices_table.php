<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_classroom')->unsigned();
            $table->integer('id_devicecat')->unsigned();
            $table->integer('id_devicelocation')->unsigned();
            $table->integer('id_devicestatus')->unsigned();
            $table->string('date_entry');
            $table->string('date_using');
            $table->string('date_warraty');
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
        Schema::drop('devices');
    }
}
