<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtydSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		collect( $this->medicalSpecialties )
			->each( fn( $specialty ) => Specialty::create( $specialty ) );

	}
	public $medicalSpecialties = [ 
		[ "name" => "Allergy and Immunology" ],
		[ "name" => "Anesthesiology" ],
		[ "name" => "Cardiology" ],
		[ "name" => "Critical Care Medicine" ],
		[ "name" => "Dermatology" ],
		[ "name" => "Emergency Medicine" ],
		[ "name" => "Endocrinology" ],
		[ "name" => "Family Medicine" ],
		[ "name" => "Gastroenterology" ],
		[ "name" => "Geriatrics" ],
		[ "name" => "Hematology" ],
		[ "name" => "Infectious Disease" ],
		[ "name" => "Internal Medicine" ],
		[ "name" => "Medical Genetics" ],
		[ "name" => "Nephrology" ],
		[ "name" => "Neurology" ],
		[ "name" => "Obstetrics and Gynecology" ],
		[ "name" => "Oncology" ],
		[ "name" => "Ophthalmology" ],
		[ "name" => "Orthopedic Surgery" ],
		[ "name" => "Otolaryngology (ENT)" ],
		[ "name" => "Palliative Medicine" ],
		[ "name" => "Pathology" ],
		[ "name" => "Pediatrics" ],
		[ "name" => "Physical Medicine and Rehabilitation" ],
		[ "name" => "Plastic Surgery" ],
		[ "name" => "Preventive Medicine" ],
		[ "name" => "Psychiatry" ],
		[ "name" => "Pulmonology" ],
		[ "name" => "Radiation Oncology" ],
		[ "name" => "Radiology" ],
		[ "name" => "Rheumatology" ],
		[ "name" => "Sports Medicine" ],
		[ "name" => "Surgery (General)" ],
		[ "name" => "Thoracic Surgery" ],
		[ "name" => "Urology" ],
		[ "name" => "Vascular Surgery",]
	];
}
