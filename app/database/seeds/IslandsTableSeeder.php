<?php

class IslandsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('islands')->truncate();

		$islands = array(
            array('island' => 'Jawa'),
            array('island' => 'Sumatera'),
            array('island' => 'Kalimantan')
        );

		// Uncomment the below to run the seeder
		DB::table('islands')->insert($islands);
	}

}
