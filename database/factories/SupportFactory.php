<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		$sender = fake()->randomElement( [ 'admin', 'user' ] );
		$adminId = $sender == 'user' ? null : 1;
		return [ 
			'admin_id' => $adminId,
			'sender' => $sender,
			'content' => fake()->realTextBetween( 100, 150 ),
		];
	}
}
