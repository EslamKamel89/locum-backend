<?php

namespace Database\Factories;

use App\Models\JobInfo;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobAdd>
 */
class JobAddFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [ 
			'title' => 'Experienced: ' . JobInfo::all()->random()->first()->name . ' needed',
			'speciality_id' => Specialty::all()->random()->first()->id,
			'job_info_id' => JobInfo::all()->random()->first()->id,
			'job_type' => fake()->randomElement( [ 'Fulltime', 'Parttime', 'Contract', 'Locum' ] ),
			'location' => fake()->address(),
			'description' => fake()->realText(),
			'responsibilities' => fake()->realText(),
			'qualifications' => fake()->realText(),
			'experience_required' => fake()->realText(),
			'salary_min' => 10000,
			'salary_max' => 10500,
			'benefits' => fake()->realText(),
			'working_hours' => '8 hours shift',
			'application_deadline' => fake()->date(),
			'required_documents' => fake()->realText(),
		];
	}
}
