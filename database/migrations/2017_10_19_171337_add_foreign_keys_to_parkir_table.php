<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToParkirTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('parkir', function(Blueprint $table)
		{
			$table->foreign('parking_at')->references('name')->on('parkiran')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('parking_slot')->references('name')->on('slot_parkir')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id')->references('nip')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('parkir', function(Blueprint $table)
		{
			$table->dropForeign('parkir_parking_at_foreign');
			$table->dropForeign('parkir_parking_slot_foreign');
			$table->dropForeign('parkir_user_id_foreign');
		});
	}

}
