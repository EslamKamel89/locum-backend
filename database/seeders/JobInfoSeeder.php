<?php

namespace Database\Seeders;

use App\Models\JobInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobInfoSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		collect( $this->medicalJobs )
			->each( fn( $job ) => JobInfo::create( $job ) );

	}

	public $medicalJobs = [ 
		[ "name" => "Medical Assistant" ],
		[ "name" => "Physical Therapy Assistant" ],
		[ "name" => "Licensed Practical Nurse" ],
		[ "name" => "Registered Nurse" ],
		[ "name" => "Nurse Practitioner" ],
		[ "name" => "Physician Assistant" ],
		[ "name" => "Radiologic Technologist" ],
		[ "name" => "Diagnostic Medical Sonographer" ],
		[ "name" => "Occupational Therapist" ],
		[ "name" => "Physical Therapist" ],
		[ "name" => "Respiratory Therapist" ],
		[ "name" => "Surgical Technologist" ],
		[ "name" => "Pharmacy Technician" ],
		[ "name" => "Clinical Laboratory Technician" ],
		[ "name" => "Medical Records Specialist" ],
		[ "name" => "Health Information Technician" ],
		[ "name" => "Paramedic" ],
		[ "name" => "Emergency Medical Technician (EMT)" ],
		[ "name" => "Dietitian" ],
		[ "name" => "Nutritionist" ],
		[ "name" => "Phlebotomist" ],
		[ "name" => "Certified Nursing Assistant (CNA)" ],
		[ "name" => "Medical Transcriptionist" ],
		[ "name" => "Home Health Aide" ],
		[ "name" => "Medical Secretary" ],
		[ "name" => "Dental Assistant" ],
		[ "name" => "Dental Hygienist" ],
		[ "name" => "Optometrist" ],
		[ "name" => "Speech-Language Pathologist" ],
		[ "name" => "Radiation Therapist" ],
		[ "name" => "Anesthesiologist Assistant" ],
		[ "name" => "Clinical Nurse Specialist" ],
		[ "name" => "Occupational Therapy Assistant" ],
		[ "name" => "Pharmacist" ],
		[ "name" => "Orthopedic Technician" ],
		[ "name" => "Cardiovascular Technologist" ],
		[ "name" => "Mental Health Counselor" ],
		[ "name" => "Rehabilitation Counselor" ],
		[ "name" => "Substance Abuse Counselor" ],
		[ "name" => "Psychiatric Technician" ],
		[ "name" => "Medical Coder" ],
		[ "name" => "Public Health Specialist" ],
		[ "name" => "Medical Equipment Technician" ],
		[ "name" => "Clinical Research Coordinator" ],
		[ "name" => "Healthcare Administrator" ],
		[ "name" => "Medical Office Manager" ],
		[ "name" => "Hospital Administrator" ],
		[ "name" => "Pediatrician" ],
		[ "name" => "General Practitioner" ],
		[ "name" => "Family Medicine Physician" ],
		[ "name" => "Cardiologist" ],
		[ "name" => "Dermatologist" ],
		[ "name" => "Neurologist" ],
		[ "name" => "Oncologist" ],
		[ "name" => "Psychiatrist" ],
		[ "name" => "Surgeon" ],
		[ "name" => "Orthopedic Surgeon" ],
		[ "name" => "Urologist" ],
		[ "name" => "Gynecologist" ],
		[ "name" => "Obstetrician" ],
		[ "name" => "Radiologist" ],
		[ "name" => "Anesthesiologist" ],
		[ "name" => "Pathologist" ],
		[ "name" => "Endocrinologist" ],
		[ "name" => "Nephrologist" ],
		[ "name" => "Pulmonologist" ],
		[ "name" => "Infectious Disease Specialist" ],
		[ "name" => "Hematologist" ],
		[ "name" => "Gastroenterologist" ],
		[ "name" => "Ophthalmologist" ],
		[ "name" => "Allergist" ],
		[ "name" => "Immunologist" ],
		[ "name" => "Chiropractor" ],
		[ "name" => "Audiologist" ],
		[ "name" => "Genetic Counselor" ],
		[ "name" => "Clinical Psychologist" ],
		[ "name" => "Biomedical Engineer" ],
		[ "name" => "Forensic Pathologist" ],
		[ "name" => "Sports Medicine Specialist" ],
		[ "name" => "Palliative Care Specialist" ],
		[ "name" => "Nuclear Medicine Technologist" ]
	];

}
