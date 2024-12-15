<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospital>
 */
class HospitalFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [ 
			'facility_name' => fake()->randomElement( $this->fakeHospitalNames ),
			'type' => fake()->randomElement( [ "Hospital", "Clinic", "Nursing Home", "Other" ] ),
			'contact_person' => fake()->name,
			'contact_email' => fake()->email,
			'contact_phone' => fake()->phoneNumber,
			'address' => fake()->address,
			'services_offered' => fake()->randomElement( $this->hospitalServices ),
			'number_of_beds' => fake()->numberBetween( 20, 200 ),
			'website_url' => fake()->imageUrl(),
			'year_established' => fake()->numberBetween( 1950, 2000 ),
			'overview' => fake()->realText(),
		];
	}
	public $fakeHospitalNames = [ "Sunrise Medical Center", "Green Valley Hospital", "Riverside Health Clinic", "Mountain View Hospital", "Lakeside General Hospital", "Pinecrest Medical Center", "Cedarwood Health Clinic", "Maple Leaf Hospital", "Oakwood Medical Center", "Silver Springs Hospital" ];

	public $hospitalServices = [ 
		"Emergency Care",
		"Cardiology",
		"Orthopedics",
		"Pediatrics",
		"Neurology",
		"Oncology",
		"Radiology",
		"Maternity Services",
		"Physical Therapy",
		"General Surgery"
	];
}
