<?php

class UsersSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('vehicles')->truncate();

		$user = array(
			"email" => "admin@control.cl",
			"password" => Hash::make('admin')
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($user);
	}

}
