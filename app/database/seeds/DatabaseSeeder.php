<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('IslandsTableSeeder');
		$this->call('ProvincesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
	}

}