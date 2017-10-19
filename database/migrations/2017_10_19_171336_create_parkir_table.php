<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParkirTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parkir', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_id')->index('parkir_user_id_foreign');
			$table->string('parking_at')->index('parkir_parking_at_foreign');
			$table->string('parking_slot')->index('parkir_parking_slot_foreign');
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
		Schema::drop('parkir');
	}

}
