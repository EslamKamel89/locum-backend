<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 */
	public function run(): void {
		$this->call( [ 
			SpecialtydSeeder::class,
			StateAndDistrictSeeder::class,
			UniversitySeeder::class,
			JobInfoSeeder::class,
			LangsSeeder::class,
			SkillSeeder::class,
			UserSeeder::class,
			JobAddSeeder::class,
			AdminSeeder::class,
			CommentSeeder::class,
			MessageSeeder::class,
		] );
	}

}



