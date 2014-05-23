<?php

class ProvincesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('provinces')->truncate();

        $provinces = array(
            array('province' => 'DKI Jakarta','id_island'=>'1'),
            array('province' => 'Jawa Tengah','id_island'=>'1'),
            array('province' => 'Jawa Barat','id_island'=>'1')
        );

		// Uncomment the below to run the seeder
		DB::table('provinces')->insert($provinces);
	}

}
