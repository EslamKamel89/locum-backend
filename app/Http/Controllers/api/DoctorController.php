<?php

namespace App\Http\Controllers\api;

use App\Exceptions\NotAuthorizedException;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use App\Models\JobInfo;
use App\Models\Lang;
use App\Models\Skill;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;
class DoctorController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$doctors = request()->has( 'limit' ) ?
			Doctor::paginate( request()->get( 'limit' ) ?? 10 ) :
			Doctor::all();
		return $this->success(
			DoctorResource::collection( $doctors ),
			pagination: request()->has( 'limit' ),
		);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {
		try {
			$this->handleStoreAuthroizationCheck();
			$validator = Validator::make(
				$request->all(),
				[ 
					'id' => [ 'sometimes', 'exists:doctors,id' ],
					'specialty_name' => [ 'sometimes' ],
					'job_info_name' => [ 'sometimes' ],
					'date_of_birth' => [ 'required' ],
					'gender' => [ 'required', Rule::in( 'male', 'female' ) ],
					'address' => [ 'required' ],
					'phone' => [ 'required' ],
					'willing_to_relocate' => [ 'required', 'boolean' ],
					'photo' => [ 'sometimes', File::image()
						// ->min( 1024 )
						// ->max( 12 * 1024 )
					]
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'photo' ) ) {
				$path = $request->file( 'photo' )->store( 'doctor/personal_imgs', 'public' );
				$path = "storage/$path";
			}

			$doctor = null;
			if ( request()->has( 'id' ) ) {
				$doctor = Doctor::findOrFail( request()->all()['id'] );
				$doctor->update( collect( $validator->validated() )
					->merge( [ 
						'user_id' => auth()->id(),
						'photo' => $path,
					] )
					->forget( [ 'id', 'specialty_name', 'job_info_name' ] )
					->toArray()
				);
			} else {
				$doctor = Doctor::create(
					collect( $validator->validated() )
						->merge( [ 
							'user_id' => auth()->id(),
							'photo' => $path,
						] )
						->forget( [ 'id', 'university_name', 'specialty_name', 'job_info_name' ] )
						->toArray()
				);
			}

			$this->attachJobInfo( $doctor );
			$this->attachSpeciality( $doctor );
			$this->handleSkillAttach( $doctor );
			$this->handleLangAttach( $doctor );
			$doctor->load( [ 'skills', 'langs' ] );
			return $this->success( new DoctorResource( $doctor ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$doctor = Doctor::findOrFail( $id );
			$doctor->Load( [ 'user', 'specialty', 'jobInfo', 'doctorInfo', 'doctorDocuments' ] );
			return $this->success( new DoctorResource( $doctor ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		try {
			$doctor = Doctor::findOrFail( $id );
			$this->checkResourceOwner( $doctor->user->id );
			$validator = Validator::make(
				$request->all(),
				[ 
					'specialty_id' => [ 'sometimes', 'exists:specialties,id' ],
					'job_info_id' => [ 'sometimes', 'exists:job_infos,id' ],
					'date_of_birth' => [ 'sometimes' ],
					'gender' => [ 'sometimes', Rule::in( 'male', 'female' ) ],
					'address' => [ 'sometimes' ],
					'phone' => [ 'sometimes' ],
					'willing_to_relocate' => [ 'sometimes', 'boolean' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$doctor->update( $validator->validated() );
			$doctor->Load( [ 'user', 'specialty', 'jobInfo', 'doctorInfo', 'doctorDocuments' ] );
			return $this->success( new DoctorResource( $doctor ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$doctor = Doctor::findOrFail( $id );
			$this->checkResourceOwner( $doctor->user->id );
			$doctor->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	public function updateUserImg( Doctor $doctor, Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'photo' => [ 'required', File::image() ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'photo' ) ) {
				$path = $request->file( 'photo' )->store( 'doctor/personal_imgs', 'public' );
				$path = "storage/$path";
			}
			$doctor->update( [ 'photo' => $path ] );
			$doctor->Load( [ 'user', 'specialty', 'jobInfo', 'doctorInfo', 'doctorDocuments' ] );
			return $this->success( new DoctorResource( $doctor ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	protected function handleSkillAttach( Doctor $doctor ) {
		$skillNames = [];
		if ( ! ( request()->has( 'skills' ) ) ) {
			return;
		}
		$skillNames = explode( ',', request()->only( 'skills' )['skills'] );

		$skillIds = collect( [] );
		foreach ( $skillNames as $skillName ) {
			$skillName = str( $skillName )->trim()->lower();
			$skill = Skill::where( 'name', $skillName )->first();
			$skillExist = false;
			foreach ( $doctor->skills as $doctorSkill ) {
				if ( $doctorSkill->id === $skill->id ) {
					$skillExist = true;
					break;
				}
			}
			if ( ! $skill ) {
				$skill = Skill::create( [ 'name' => $skillName ] );
			}
			if ( ! $skillExist ) {
				$skillIds->add( $skill->id );
			}
		}
		$doctor->skills()->attach( $skillIds );
	}

	protected function handleLangAttach( Doctor $doctor ) {
		$langNames = [];
		if ( ! ( request()->has( 'langs' ) ) ) {
			return;
		}
		$langNames = explode( ',', request()->only( 'langs' )['langs'] );

		$langIds = collect( [] );
		foreach ( $langNames as $langName ) {
			$langName = str( $langName )->trim()->lower();
			$lang = Lang::where( 'name', $langName )->first();
			$langExist = false;
			foreach ( $doctor->langs as $doctorLang ) {
				if ( $doctorLang->id === $lang->id ) {
					$langExist = true;
					break;
				}
			}
			if ( ! $lang ) {
				$lang = Lang::create( [ 'name' => $langName ] );
			}
			if ( ! $langExist ) {
				$langIds->add( $lang->id );
			}
		}
		$doctor->langs()->attach( $langIds );
	}

	protected function handleStoreAuthroizationCheck() {
		if ( auth()->user()->type !== 'doctor' ) {
			throw new NotAuthorizedException( [ "This user is not signed as a health care professional" ] );
		}
		if ( auth()->user()->doctor && ! request()->has( [ 'id' ] ) ) {
			throw new NotAuthorizedException( [ "This health care professionl completed his basic information" ] );
		}
	}

	protected function attachSpeciality( Doctor $doctor ) {
		if ( ! request()->has( 'specialty_name' ) )
			return;
		$specialityName = strtolower( trim( request()->all()['specialty_name'] ) );
		$speciality = Specialty::where( 'name', $specialityName )->first();
		if ( ! $speciality ) {
			$speciality = Specialty::create( [ 'name' => $specialityName ] );
		}
		$doctor->update( [ 'specialty_id' => $speciality->id ] );
	}

	protected function attachJobInfo( Doctor $doctor ) {
		if ( ! request()->has( 'job_info_name' ) )
			return;
		$jobInfoName = strtolower( trim( request()->all()['job_info_name'] ) );
		$jobInfo = JobInfo::where( 'name', $jobInfoName )->first();
		if ( ! $jobInfo ) {
			$jobInfo = JobInfo::create( [ 'name' => $jobInfoName ] );
		}
		$doctor->update( [ 'job_info_id' => $jobInfo->id ] );
	}
}
