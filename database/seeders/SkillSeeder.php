<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		collect( $this->skills )->each( fn( $skill ) => Skill::create( $skill ) );

	}
	public $skills = [ 
		[ "name" => "Patient Assessment" ],
		[ "name" => "EMR (Electronic Medical Records)" ],
		[ "name" => "Surgical Precision" ],
		[ "name" => "Diagnostic Accuracy" ],
		[ "name" => "CPR Certification" ],
		[ "name" => "Leadership" ],
		[ "name" => "Problem-Solving" ],
		[ "name" => "Communication" ],
		[ "name" => "Empathy" ],
		[ "name" => "Teamwork" ],
		[ "name" => "Attention to Detail" ],
		[ "name" => "Professionalism" ],
		[ "name" => "Technical Skills" ],
		[ "name" => "Critical Thinking" ],
		[ "name" => "Time Management" ],
		[ "name" => "Adaptability" ],
		[ "name" => "Interpersonal Skills" ],
		[ "name" => "Compassion" ],
		[ "name" => "Decision-Making" ],
		[ "name" => "Stress Management" ],
		[ "name" => "Research Skills" ],
		[ "name" => "Ethical Judgment" ]
	];

}
