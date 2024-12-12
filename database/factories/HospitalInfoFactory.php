<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HospitalInfo>
 */
class HospitalInfoFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [ 
			'license_number' => fake()->numberBetween( 100000, 1000000 ),
			'license_state' => State::all()->random( 1 )->first()->name,
			'license_issue_date' => fake()->dateTimeBetween( '-40 years', '-20 years' ),
			'license_expiry_date' => fake()->dateTimeBetween( '-40 years', '-20 years' ),
			'operating_hours' => '24HR',
		];
	}
}
