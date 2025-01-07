<?php

namespace Database\Seeders;

use App\Models\Hospital;
use App\Models\JobAdd;
use App\Models\JobApplication;
use App\Models\JobInfo;
use App\Models\Specialty;
use Database\Factories\JobAddFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobAddSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		$hospitals = Hospital::all();
		$hospitals->each( function (Hospital $hospital) {
			JobAddFactory::$countSeq++;
			$jobAdd = JobAdd::factory()->create( [ 
				'hospital_id' => $hospital->id,
				// 'speciality_id' => Specialty::all()->random()->first()->id,
				// 'job_info_id' => JobInfo::all()->random()->first()->id,
				'speciality_id' => fake()->numberBetween( 1, Specialty::count() ),
				'job_info_id' => fake()->numberBetween( 1, JobInfo::count() ),


			] );
			$jobAdd->skills()->attach( [ 1, 2, 3 ] );
			$jobAdd->langs()->attach( [ 1, 2, 3 ] );
			$jobApplication = JobApplication::factory()->create( [ 
				'job_add_id' => $jobAdd->id,
			] );
		} );
	}
}
