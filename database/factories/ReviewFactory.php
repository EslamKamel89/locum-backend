<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\JobAdd;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		$parent = fake()->randomElement( [ 'doctor', 'hospital', 'jobAdd' ] );
		if ( $parent == 'doctor' ) {
			return [ 
				'user_id' => User::inRandomOrder()->first()->id,
				'reviewable_id' => Doctor::inRandomOrder()->first()->id,
				'reviewable_type' => 'App\Models\Doctor',
				'content' => fake()->realText(),
				'rating' => fake()->numberBetween( 1, 5 ),
			];
		}
		if ( $parent == 'hospital' ) {
			return [ 
				'user_id' => User::inRandomOrder()->first()->id,
				'reviewable_id' => Hospital::inRandomOrder()->first()->id,
				'reviewable_type' => 'App\Models\Hospital',
				'content' => fake()->realText(),
				'rating' => fake()->numberBetween( 1, 5 ),
			];
		}
		if ( $parent == 'jobAdd' ) {
			return [ 
				'user_id' => User::inRandomOrder()->first()->id,
				'reviewable_id' => JobAdd::inRandomOrder()->first()->id,
				'reviewable_type' => 'App\Models\JobAdd',
				'content' => fake()->realText(),
				'rating' => fake()->numberBetween( 1, 5 ),
			];
		}

		return [

		];
	}
}
