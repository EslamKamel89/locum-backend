<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorDocument;
use App\Models\DoctorInfo;
use App\Models\Hospital;
use App\Models\HospitalDocument;
use App\Models\HospitalInfo;
use App\Models\JobAdd;
use App\Models\JobApplication;
use App\Models\JobInfo;
use App\Models\Lang;
use App\Models\Review;
use App\Models\Skill;
use App\Models\Specialty;
use App\Models\State;
use App\Models\University;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\JobAddFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {


	/**
	 * Seed the application's database.
	 */
	public function run(): void {
		collect( $this->medicalSpecialties )
			->each( fn( $specialty ) => Specialty::create( $specialty ) );

		collect( $this->statesDistricts )
			->each( function ($state) {
				$stateModel = State::create( [ 'name' => $state['state_name'] ] );
				collect( $state['districts'] )
					->each( function ($district) use ($stateModel) {
						District::create( [ 
							'state_id' => $stateModel->id,
							'name' => $district['district_name']
						] );
					} );
			} );

		collect( $this->universities )
			->each( fn( $university ) => University::create( $university ) );

		collect( $this->medicalJobs )
			->each( fn( $job ) => JobInfo::create( $job ) );

		collect( $this->langs )->each( fn( $lang ) => Lang::create( $lang ) );
		collect( $this->skills )->each( fn( $skill ) => Skill::create( $skill ) );

		$usersAsHospitals = User::factory()
			->count( 50 )
			->sequence( function (Sequence $sequence) {
				if ( $sequence->index == 0 ) {
					return [ 
						'name' => "hospital",
						'email' => "hospital@gmail.com",
						'type' => 'hospital',
					];
				}
				$index = $sequence->index + 1;
				return [ 
					'name' => "Hospital{$index} " . fake()->name(),
					'email' => "hospital{$index}_" . fake()->email(),
					'type' => 'hospital',
				];
			} )->create();
		$usersAsHospitals->each( function ($userHospital, $index) {

			$hospital = Hospital::factory()->create( [ 
				'user_id' => $userHospital->id,
			] );

			HospitalInfo::factory()->create( [ 
				'hospital_id' => $hospital->id,
			] );

			HospitalDocument::factory()->create( [ 
				'hospital_id' => $hospital->id,
			] );
			// if ( $userHospital->id == 1 )
			// 	return;
		} );
		$usersAsDoctors = User::factory()
			->count( 50 )
			->sequence( function (Sequence $sequence) {
				if ( $sequence->index == 0 ) {
					return [ 
						'name' => "doctor",
						'email' => "doctor@gmail.com",
						'type' => 'doctor',
					];
				}
				$index = $sequence->index + 1;
				return [ 
					'name' => "Dr{$index} " . fake()->name(),
					'email' => "dr{$index}_" . fake()->email(),
					'type' => 'doctor',
				];
			} )->create();
		$usersAsDoctors->each( function ($user, $index) {
			// if ( $user->id == 1 )
			// 	return;
			$doctor = Doctor::factory()->create( [ 
				'user_id' => $user->id,
			] );


			DoctorInfo::factory()->create( [ 
				'doctor_id' => $doctor->id,
			] );

			DoctorDocument::factory()->create( [ 
				'doctor_id' => $doctor->id,
			] );
			$doctor->langs()->attach( [ 1, 2, 3 ] );
			$doctor->skills()->attach( [ 1, 2, 3 ] );

		} );
		$hospitals = Hospital::all();
		$hospitals->each( function (Hospital $hospital) {
			JobAddFactory::$countSeq++;
			$jobAdd = JobAdd::factory()->create( [ 
				'hospital_id' => $hospital->id,
				// 'speciality_id' => Specialty::all()->random()->first()->id,
				// 'job_info_id' => JobInfo::all()->random()->first()->id,
				'speciality_id' => fake()->numberBetween( 1, Specialty::count() ),
				'job_info_id' => fake()->numberBetween( 1, jobInfo::count() ),


			] );
			$jobAdd->skills()->attach( [ 1, 2, 3 ] );
			$jobAdd->langs()->attach( [ 1, 2, 3 ] );
			$jobApplication = JobApplication::factory()->create( [ 
				'job_add_id' => $jobAdd->id,
			] );
		} );
		Admin::create( [ 
			'name' => 'admin',
			'email' => 'admin@gmail.com',
			'password' => 'password',
		] );
		Review::factory( 50 )->create();
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

	public $statesDistricts = [ 
		[ 
			'state_name' => 'California',
			'districts' => [ 
				[ 'district_name' => 'Los Angeles County' ],
				[ 'district_name' => 'San Diego County' ],
				[ 'district_name' => 'Orange County' ],
				[ 'district_name' => 'Riverside County' ],
				[ 'district_name' => 'San Bernardino County' ],
				[ 'district_name' => 'Santa Clara County' ],
				[ 'district_name' => 'Alameda County' ],
				[ 'district_name' => 'Sacramento County' ],
				[ 'district_name' => 'Fresno County' ],
				[ 'district_name' => 'San Francisco County' ],
			],
		],
		[ 
			'state_name' => 'Texas',
			'districts' => [ 
				[ 'district_name' => 'Harris County' ],
				[ 'district_name' => 'Dallas County' ],
				[ 'district_name' => 'Tarrant County' ],
				[ 'district_name' => 'Bexar County' ],
				[ 'district_name' => 'Travis County' ],
				[ 'district_name' => 'Collin County' ],
				[ 'district_name' => 'El Paso County' ],
				[ 'district_name' => 'Denton County' ],
				[ 'district_name' => 'Fort Bend County' ],
				[ 'district_name' => 'Hidalgo County' ],
			],
		],
		[ 
			'state_name' => 'New York',
			'districts' => [ 
				[ 'district_name' => 'New York County (Manhattan)' ],
				[ 'district_name' => 'Kings County (Brooklyn)' ],
				[ 'district_name' => 'Queens County' ],
				[ 'district_name' => 'Bronx County' ],
				[ 'district_name' => 'Richmond County (Staten Island)' ],
				[ 'district_name' => 'Nassau County' ],
				[ 'district_name' => 'Suffolk County' ],
				[ 'district_name' => 'Westchester County' ],
				[ 'district_name' => 'Erie County' ],
				[ 'district_name' => 'Monroe County' ],
			],
		],
		[ 
			'state_name' => 'Florida',
			'districts' => [ 
				[ 'district_name' => 'Miami-Dade County' ],
				[ 'district_name' => 'Broward County' ],
				[ 'district_name' => 'Palm Beach County' ],
				[ 'district_name' => 'Hillsborough County' ],
				[ 'district_name' => 'Orange County' ],
				[ 'district_name' => 'Pinellas County' ],
				[ 'district_name' => 'Duval County' ],
				[ 'district_name' => 'Lee County' ],
				[ 'district_name' => 'Polk County' ],
				[ 'district_name' => 'Brevard County' ],
			],
		],
		[ 
			'state_name' => 'Illinois',
			'districts' => [ 
				[ 'district_name' => 'Cook County' ],
				[ 'district_name' => 'DuPage County' ],
				[ 'district_name' => 'Lake County' ],
				[ 'district_name' => 'Will County' ],
				[ 'district_name' => 'Kane County' ],
				[ 'district_name' => 'McHenry County' ],
				[ 'district_name' => 'Winnebago County' ],
				[ 'district_name' => 'Madison County' ],
				[ 'district_name' => 'St. Clair County' ],
				[ 'district_name' => 'Peoria County' ],
			],
		],
		[ 
			'state_name' => 'Georgia',
			'districts' => [ 
				[ 'district_name' => 'Fulton County' ],
				[ 'district_name' => 'Gwinnett County' ],
				[ 'district_name' => 'Cobb County' ],
				[ 'district_name' => 'DeKalb County' ],
				[ 'district_name' => 'Clayton County' ],
				[ 'district_name' => 'Chatham County' ],
				[ 'district_name' => 'Cherokee County' ],
				[ 'district_name' => 'Forsyth County' ],
				[ 'district_name' => 'Henry County' ],
				[ 'district_name' => 'Hall County' ],
			],
		],
		[ 
			'state_name' => 'Pennsylvania',
			'districts' => [ 
				[ 'district_name' => 'Philadelphia County' ],
				[ 'district_name' => 'Allegheny County' ],
				[ 'district_name' => 'Montgomery County' ],
				[ 'district_name' => 'Bucks County' ],
				[ 'district_name' => 'Delaware County' ],
				[ 'district_name' => 'Lancaster County' ],
				[ 'district_name' => 'Chester County' ],
				[ 'district_name' => 'York County' ],
				[ 'district_name' => 'Berks County' ],
				[ 'district_name' => 'Lehigh County' ],
			],
		],
		[ 
			'state_name' => 'Ohio',
			'districts' => [ 
				[ 'district_name' => 'Franklin County' ],
				[ 'district_name' => 'Cuyahoga County' ],
				[ 'district_name' => 'Hamilton County' ],
				[ 'district_name' => 'Summit County' ],
				[ 'district_name' => 'Montgomery County' ],
				[ 'district_name' => 'Lucas County' ],
				[ 'district_name' => 'Stark County' ],
				[ 'district_name' => 'Butler County' ],
				[ 'district_name' => 'Lorain County' ],
				[ 'district_name' => 'Mahoning County' ],
			],
		],
	];

	public $universities = [ 
		[ 'name' => 'Massachusetts Institute of Technology' ],
		[ 'name' => 'Harvard University' ],
		[ 'name' => 'Stanford University' ],
		[ 'name' => 'California Institute of Technology' ],
		[ 'name' => 'University of Pennsylvania' ],
		[ 'name' => 'University of California, Berkeley' ],
		[ 'name' => 'Cornell University' ],
		[ 'name' => 'University of Chicago' ],
		[ 'name' => 'Princeton University' ],
		[ 'name' => 'Yale University' ],
		[ 'name' => 'Columbia University' ],
		[ 'name' => 'University of Michigan, Ann Arbor' ],
		[ 'name' => 'University of California, Los Angeles' ],
		[ 'name' => 'University of California, San Diego' ],
		[ 'name' => 'University of Washington' ],
		[ 'name' => 'New York University' ],
		[ 'name' => 'University of Southern California' ],
		[ 'name' => 'University of Wisconsin-Madison' ],
		[ 'name' => 'Duke University' ],
		[ 'name' => 'Northwestern University' ],
		[ 'name' => 'University of Texas at Austin' ],
		[ 'name' => 'University of Illinois at Urbana-Champaign' ],
		[ 'name' => 'Johns Hopkins University' ],
		[ 'name' => 'University of California, San Francisco' ],
		[ 'name' => 'University of California, Santa Barbara' ],
		[ 'name' => 'University of North Carolina at Chapel Hill' ],
		[ 'name' => 'University of California, Davis' ],
		[ 'name' => 'University of Minnesota, Twin Cities' ],
		[ 'name' => 'Purdue University' ],
		[ 'name' => 'University of Florida' ],
		[ 'name' => 'Brown University' ],
		[ 'name' => 'Rice University' ],
		[ 'name' => 'Vanderbilt University' ],
		[ 'name' => 'University of Virginia' ],
		[ 'name' => 'Pennsylvania State University' ],
		[ 'name' => 'Emory University' ],
		[ 'name' => 'Carnegie Mellon University' ],
		[ 'name' => 'University of Colorado Boulder' ],
		[ 'name' => 'University of Arizona' ],
		[ 'name' => 'University of Miami' ],
		[ 'name' => 'University of Maryland, College Park' ],
		[ 'name' => 'Boston University' ],
		[ 'name' => 'Rutgers, The State University of New Jersey' ],
		[ 'name' => 'University of Pittsburgh' ],
		[ 'name' => 'Michigan State University' ],
		[ 'name' => 'University of California, Riverside' ],
		[ 'name' => 'University of Notre Dame' ],
		[ 'name' => 'Washington University in St. Louis' ],
		[ 'name' => 'Ohio State University' ],
		[ 'name' => 'University of Utah' ],
		[ 'name' => 'University of Connecticut' ],
		[ 'name' => 'University of Georgia' ],
		[ 'name' => 'Florida State University' ],
		[ 'name' => 'University of Oklahoma' ],
		[ 'name' => 'University of Kansas' ],
		[ 'name' => 'University of Iowa' ],
		[ 'name' => 'Indiana University Bloomington' ],
		[ 'name' => 'University of Alabama' ],
		[ 'name' => 'University of Nebraska-Lincoln' ],
		[ 'name' => 'University of Kentucky' ],
		[ 'name' => 'University of Mississippi' ],
		[ 'name' => 'University of Missouri' ],
		[ 'name' => 'University of Tennessee' ],
		[ 'name' => 'Clemson University' ],
		[ 'name' => 'University of Arkansas' ],
		[ 'name' => 'Auburn University' ],
		[ 'name' => 'University of Delaware' ],
		[ 'name' => 'Texas A&M University' ],
		[ 'name' => 'University of Houston' ],
		[ 'name' => 'University of Texas at Dallas' ],
		[ 'name' => 'University of Texas at San Antonio' ],
		[ 'name' => 'University of Central Florida' ],
		[ 'name' => 'University of South Florida' ],
		[ 'name' => 'Georgia Institute of Technology' ],
		[ 'name' => 'University of Louisville' ],
		[ 'name' => 'University of South Carolina' ],
		[ 'name' => 'University of Vermont' ],
		[ 'name' => 'University of Hawaii at Manoa' ],
		[ 'name' => 'University of New Mexico' ],
		[ 'name' => 'University of Nevada, Las Vegas' ],
		[ 'name' => 'University of North Dakota' ],
		[ 'name' => 'University of Rhode Island' ],
		[ 'name' => 'University of Wyoming' ]
	];

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

	public $langs = [ 
		[ "name" => "English" ],
		[ "name" => "Arabic" ],
		[ "name" => "Spanish" ],
		[ "name" => "Chinese" ],
		[ "name" => "French" ],
		[ "name" => "Korean" ],
		[ "name" => "German" ],
		[ "name" => "Russian" ],
	];

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



