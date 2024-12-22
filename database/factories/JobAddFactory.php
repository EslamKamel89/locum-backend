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
	public static int $countSeq = 1;
	public function definition(): array {
		return [ 
			'title' => 'Experienced: ' . JobInfo::inRandomOrder()->first()->name . ' needed (' . self::$countSeq . ')',

			'job_type' => fake()->randomElement( [ 'Fulltime', 'Parttime', 'Contract', 'Locum' ] ),
			'location' => fake()->address(),
			'description' => fake()->realText(),
			'responsibilities' => fake()->realText(),
			'qualifications' => fake()->realText(),
			'experience_required' => fake()->realText(),
			'salary_min' => fake()->numberBetween( 10000, 15000 ),
			'salary_max' => fake()->numberBetween( 15000, 20000 ),
			'benefits' => fake()->realText(),
			'working_hours' => '8 hours shift',
			'application_deadline' => fake()->date(),
			'required_documents' => fake()->realText(),
		];
	}
}
