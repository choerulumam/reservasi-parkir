<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Booking_Logs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nip')->index('booking_logs_nip_foreign');
			$table->string('username');
			$table->string('Booking_slot');
			$table->string('actions');
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
		Schema::drop('Booking_Logs');
	}

}
