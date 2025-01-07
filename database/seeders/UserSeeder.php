<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\DoctorDocument;
use App\Models\DoctorInfo;
use App\Models\Hospital;
use App\Models\HospitalDocument;
use App\Models\HospitalInfo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {

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
			$hospital->Specialties()->attach( [ 1, 2, 3, 5, 6 ] );
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
	}
}
