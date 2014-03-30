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
		//TODO: jadi ga jalan in kenapa ya?
		//$this->call('UserTableSeeder');
		//$this->call('ConfigTableSeeder');
		$this->call('Traffic_rulesTableSeeder');
		$this->call('TrafficrulesTableSeeder');
		$this->call('RecipientsTableSeeder');
		$this->call('Access_historiesTableSeeder');
		$this->call('Notif_configsTableSeeder');
		$this->call('Notif_settingsTableSeeder');
		$this->call('AirlinesTableSeeder');
		$this->call('IslandsTableSeeder');
		$this->call('ProvincesTableSeeder');
	}

}