<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\JobAddResource;
use App\Models\JobAdd;
use App\Models\Lang;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class JobAddController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$jobAdds = request()->has( 'limit' ) ?
			JobAdd::paginate( request()->get( 'limit' ) ?? 10 ) :
			JobAdd::all();
		return $this->success(
			JobAddResource::collection( $jobAdds ),
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
					'title' => [ 'required' ],
					'speciality_id' => [ 'sometimes', 'exists:specialties,id' ],
					'job_info_id' => [ 'sometimes', 'exists:job_infos,id' ],
					'job_type' => [ 'sometimes' ],
					'location' => [ 'sometimes' ],
					'description' => [ 'sometimes' ],
					'responsibilities' => [ 'sometimes' ],
					'qualifications' => [ 'sometimes' ],
					'experience_required' => [ 'sometimes' ],
					'salary_min' => [ 'sometimes', 'numeric' ],
					'salary_max' => [ 'sometimes', 'numeric' ],
					'benefits' => [ 'sometimes' ],
					'working_hours' => [ 'sometimes' ],
					'application_deadline' => [ 'sometimes', 'date' ],
					'required_documents' => [ 'sometimes' ],

				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}

			$jobAdd = JobAdd::create(
				collect( $validator->validated() )
					->merge( [ 
						'hospital_id' => auth()->user()->hospital->id,
					] )->toArray()
			);
			$this->handleSkillAttach( $jobAdd );
			$this->handleLangAttach( $jobAdd );
			$jobAdd->load( [ 'langs', 'skills' ] );
			return $this->success( new JobAddResource( $jobAdd ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$jobAdd = JobAdd::findOrFail( $id );
			$jobAdd->Load( [ "hospital", "specialty", "jobInfo" ] );
			return $this->success( new JobAddResource( $jobAdd ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}



	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'title' => [ 'sometimes' ],
					'speciality_id' => [ 'sometimes', 'exists:specialties,id' ],
					'job_info_id' => [ 'sometimes', 'exists:job_infos,id' ],
					'job_type' => [ 'sometimes' ],
					'location' => [ 'sometimes' ],
					'description' => [ 'sometimes' ],
					'responsibilities' => [ 'sometimes' ],
					'qualifications' => [ 'sometimes' ],
					'experience_required' => [ 'sometimes' ],
					'salary_min' => [ 'sometimes', 'numeric' ],
					'salary_max' => [ 'sometimes', 'numeric' ],
					'benefits' => [ 'sometimes' ],
					'working_hours' => [ 'sometimes' ],
					'application_deadline' => [ 'sometimes', 'date' ],
					'required_documents' => [ 'sometimes' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$jobAdd = JobAdd::findOrFail( $id );
			$jobAdd->update( $validator->validated() );
			$jobAdd->Load( [ "hospital", "specialty", "jobInfo" ] );
			return $this->success( new JobAddResource( $jobAdd ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$jobAdd = JobAdd::findOrFail( $id );
			$jobAdd->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	protected function handleSkillAttach( JobAdd $jobAdd ) {
		$skillNames = [];
		if ( ! ( request()->has( 'skills' ) ) ) {
			return;
		}
		$skillNames = explode( ',', request()->only( 'skills' )['skills'] );

		$skillIds = collect( [] );
		foreach ( $skillNames as $skillName ) {
			$skill = Skill::where( 'name', trim( $skillName ) )->first();
			if ( ! $skill ) {
				$skill = Skill::create( [ 'name' => trim( $skillName ) ] );
			}
			$skillIds->add( $skill->id );
		}
		$jobAdd->skills()->attach( $skillIds );
	}
	protected function handleLangAttach( JobAdd $jobAdd ) {
		$langNames = [];
		if ( ! ( request()->has( 'langs' ) ) ) {
			return;
		}
		$langNames = explode( ',', request()->only( 'langs' )['langs'] );

		$langIds = collect( [] );
		foreach ( $langNames as $langName ) {
			$lang = Lang::where( 'name', trim( $langName ) )->first();
			if ( ! $lang ) {
				$lang = Lang::create( [ 'name' => trim( $langName ) ] );
			}
			$langIds->add( $lang->id );
		}
		$jobAdd->langs()->attach( $langIds );
	}

	protected function handleStoreAuthroizationCheck() {
		if ( auth()->user()->type !== 'hospital' ) {
			throw new \Exception( "This user is not signed as a health care provider" );
		}
		if ( ! auth()->user()->hospital ) {
			throw new \Exception( "this health care proivder didn't complete his basic profile information" );
		}
		if ( ! auth()->user()->hospital->hospitalInfo ) {
			throw new \Exception( "This Health Care Provider didn't complete his profile information" );
		}
	}
}

