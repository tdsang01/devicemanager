<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_device')->unsigned();
            $table->integer('id_borrower')->unsigned();
            $table->string('date_borrow');
            $table->string('date_render');
            $table->integer('id_periodstart')->unsigned();
            $table->integer('id_periodend')->unsigned();
            $table->integer('id_lender')->unsigned();
            $table->integer('flag_email');
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
        Schema::drop('histories');
    }
}
