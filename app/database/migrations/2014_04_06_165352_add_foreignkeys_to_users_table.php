<?php

use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function($table) {
            $table->foreign('role_id')->references('id')->on('roles');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('users', function($table){
            $table->drop_index('users_role_id_foreign');
            $table->drop_foreign('users_role_id_foreign');
        });
	}

}