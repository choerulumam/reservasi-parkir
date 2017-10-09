<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReaddForeignToParkirTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parkir', function (Blueprint $table) {
            $table->foreign('user_id')->references('nip')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parking_at')->references('name')->on('parkiran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parking_slot')->references('name')->on('slot_parkir')->onDelete('cascade')->onUpdate('cascade');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parkir', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('parking_at');
            $table->dropForeign('parking_slot');
        }); 
    }
}
