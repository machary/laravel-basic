<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('roles')->truncate();

		$roles = array(
            array('role_name'=>'Administrator'),
            array('role_name'=>'Data Entry'),
            array('role_name'=>'Stakeholders')
		);


		// Uncomment the below to run the seeder
		DB::table('roles')->insert($roles);
	}

}
