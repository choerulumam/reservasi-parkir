<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToBookingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Booking_Logs', function($table) {
            $table->string('username')->after('id');
            $table->string('actions')->after('Booking_slot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Booking_Logs', function($table) {
            $table->dropColumn('username');
            $table->dropColumn('actions');
        });
    }
}
