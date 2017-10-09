<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToParkirByIdTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parkir_by_id_tags', function (Blueprint $table) {
            $table->foreign('parked_at')->references('name')->on('parkiran')->ondelete('cascade')->onupdate('cascade');
            $table->foreign('parked_slot')->references('name')->on('slot_parkir')->ondelete('cascade')->onupdate('cascade');
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('parkir_by_id_tags', function (Blueprint $table) {
            $table->dropForeign('parked_at');
            $table->dropForeign('parked_slot');
        }); 
    }
}
