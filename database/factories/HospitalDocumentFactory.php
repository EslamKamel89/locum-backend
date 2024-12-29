<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HospitalDocument>
 */
class HospitalDocumentFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [ 
			'type' => fake()->randomElement( [ 'License', 'Accreditation', 'ID Proof', 'Certificate' ] ),
			'file' => fake()->imageUrl(),
			'name' => fake()->firstName() . '.' . fake()->fileExtension()
		];
	}
}
