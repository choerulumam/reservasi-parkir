<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToBookingLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Booking_Logs', function (Blueprint $table) {
            $table->string('nip')->after('id');
            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropColumn('nip');
            $table->dropForeign('nip');
        });
    }
}
