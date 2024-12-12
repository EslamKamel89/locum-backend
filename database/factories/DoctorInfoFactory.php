<?php

namespace Database\Factories;

use App\Models\JobInfo;
use App\Models\Specialty;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorInfo>
 */
class DoctorInfoFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [ 
			'professional_license_number' => fake()->numberBetween( 100000, 1000000 ),
			'license_state' => State::all()->random( 1 )->first()->name,
			'license_issue_date' => fake()->dateTimeBetween( '-40 years', '-20 years' ),
			'license_expiry_date' => fake()->dateTimeBetween( '-40 years', '-20 years' ),
			'university_id' => JobInfo::all()->random( 1 )->first()->id,
			'highest_degree' => 'MD',
			'field_of_study' => Specialty::all()->random( 1 )->first()->name,
			'graduation_year' => fake()->numberBetween( 1990, 2010 ),
			'work_experience' => '10 years of experience in cardiology, including 5 years as a senior consultant.',
			'biography' => 'Dr. John Doe is a highly experienced cardiologist with a passion for patient care and medical research. He has published numerous papers in reputed journals and is actively involved in community health programs.'

		];
	}
}
