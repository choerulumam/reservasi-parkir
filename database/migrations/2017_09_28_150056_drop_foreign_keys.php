<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parkir_by_id_tags', function(Blueprint $table){
         $table->dropForeign('parkir_by_id_tags_parked_at_foreign');
         $table->dropColumn('parked_at');
         $table->dropForeign('parkir_by_id_tags_parked_slot_foreign');
         $table->dropColumn('parked_slot');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
