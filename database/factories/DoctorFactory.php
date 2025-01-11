<?php

namespace Database\Factories;

use App\Models\JobInfo;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [ 
			'specialty_id' => Specialty::all()->random( 1 )->first()->id,
			'job_info_id' => JobInfo::all()->random( 1 )->first()->id,
			'date_of_birth' => fake()->dateTimeBetween( '-40 years', '-20 years' ),
			'gender' => fake()->randomElement( [ 'male', 'female' ] ),
			'shift_preference' => fake()->randomElement( [ 'day', 'night', 'weekday', 'weekend', 'noPreference' ] ),
			'address' => fake()->address,
			'phone' => fake()->phoneNumber,
			'willing_to_relocate' => fake()->boolean,
			'photo' => "https://randomuser.me/api/portraits/men/" . fake()->numberBetween( 1, 99 ) . ".jpg",
		];
	}
}
