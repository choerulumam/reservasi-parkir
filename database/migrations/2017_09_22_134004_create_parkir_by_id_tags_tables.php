<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkirByIdTagsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir_by_id_tags', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('id_tags');
            $table->string('parked_at'); // custom primary_key of parkiran
            $table->string('parked_slot'); 
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
        Schema::dropIfExists('parkir_by_id_tags');
    }
}
