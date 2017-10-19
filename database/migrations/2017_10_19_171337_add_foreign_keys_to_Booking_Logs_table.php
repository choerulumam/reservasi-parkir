<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookingLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Booking_Logs', function(Blueprint $table)
		{
			$table->foreign('nip')->references('nip')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Booking_Logs', function(Blueprint $table)
		{
			$table->dropForeign('booking_logs_nip_foreign');
		});
	}

}
