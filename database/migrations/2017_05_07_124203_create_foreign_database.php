<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
           $table->foreign('role')->references('id')->on('roles')
           ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('devices', function($table) {
           $table->foreign('id_classroom')->references('id')->on('classrooms')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_devicecat')->references('id')->on('device_cats')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_devicelocation')->references('id')->on('device_locations')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_devicestatus')->references('id')->on('device_statuses')
           ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('histories', function($table) {
           $table->foreign('id_borrower')->references('id')->on('users')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_lender')->references('id')->on('users')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_device')->references('id')->on('devices')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_periodstart')->references('id')->on('period_of_classes')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_periodend')->references('id')->on('period_of_classes')
           ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::table('repairs', function($table) {
           $table->foreign('id_device')->references('id')->on('devices')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_reporter')->references('id')->on('users')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('id_repairer')->references('id')->on('users')
           ->onUpdate('cascade')->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropForeign('role_foreign');
      });

      Schema::table('devices', function (Blueprint $table) {
        $table->dropForeign('id_classroom_foreign');
        $table->dropForeign('id_devicecat_foreign');
        $table->dropForeign('id_devicelocation_foreign');
        $table->dropForeign('id_devicestatus_foreign');
      });

      Schema::table('histories', function (Blueprint $table) {
        $table->dropForeign('id_borrower_foreign');
        $table->dropForeign('id_lender_foreign');
        $table->dropForeign('id_device_foreign');
        $table->dropForeign('id_periodstart_foreign');
        $table->dropForeign('id_periodend_foreign');
      });

      Schema::table('repairs', function (Blueprint $table) {
        $table->dropForeign('id_device_foreign');
        $table->dropForeign('id_reporter_foreign');
        $table->dropForeign('id_repairer_foreign');
      });
    }
}
