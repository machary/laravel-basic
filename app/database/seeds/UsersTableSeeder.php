<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

        User::create(array(
            'id'        => 'admin',
            'fullname'  => 'Administrator',
            'password'  => Hash::make('password'),
            'email'     => 'admin@localhost'
        ));

		// Uncomment the below to run the seeder
		// DB::table('users')->insert($users);
	}

}
