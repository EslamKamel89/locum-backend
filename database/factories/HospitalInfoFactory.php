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
			'staffing_levels' => fake()->realTextBetween( 50, 100 ),
			'services_offered' => $this->services,
			'notifcation_preferences' => $this->preferences,
			'feedback_method' => fake()->realTextBetween( 50, 100 ),
			'general_policy' => fake()->realTextBetween( 50, 100 ),
			'emergency_policy' => fake()->realTextBetween( 50, 100 ),
			'affiliations' => fake()->realTextBetween( 50, 100 ),
		];
	}
	public $services = [ 
		"Emergency Care",
		"Outpatient Department (OPD)",
		"Inpatient Care",
		"Intensive Care Unit (ICU)",
		"Maternity Services",
		"Surgery",
		"Laboratory and Diagnostic Services",
		"Pharmacy",
		"Specialty Services",
		"Rehabilitation Services" ]
	;
	public $preferences =
		[ "Email Notifications",
			"SMS Notifications",
			"Phone Call Notifications",
			"Push Notifications",
			"In-App Messages" ]
	;


}
