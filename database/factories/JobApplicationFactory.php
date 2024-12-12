<?php

namespace Database\Factories;

use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplication>
 */
class JobApplicationFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [ 
			'doctor_id' => Doctor::all()->random()->first()->id,
			'status' => fake()->randomElement( [ "pending", "accepted", "rejected" ] ),
			'application_date' => now(),
			'additional_notes' => fake()->realText(),
		];
	}
}
