<?php

namespace App\Http\Controllers\api;

use App\Exceptions\NotAuthorizedException;
use App\Http\Resources\JobApplicationResource;
use App\Models\JobAdd;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class JobApplicationController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {

		$jobApplications = JobApplication::with( [ 'jobAdd.specialty', 'jobAdd.jobInfo' ] )
			->where( 'doctor_id', auth()->user()->doctor->id )
			->orderBy( 'created_at', 'desc' )
			->when(
				request()['status'] ?? null, fn( Builder $q ) => $q->where( 'status', request()['status'] )
			)
			->paginate( request()->get( 'limit' ) ?? 10 );
		// $this->pr( $jobApplications );
		return $this->success(
			JobApplicationResource::collection( $jobApplications ),
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
					'job_add_id' => [ 'required', 'exists:job_adds,id' ],
					'additional_notes' => [ 'sometimes' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$this->checkUserApplied( $validator->validated()['job_add_id'] );
			$jobApplication = JobApplication::create(
				collect( $validator->validated() )
					->merge( [ 
						'doctor_id' => auth()->user()->doctor->id,
					] )->toArray()
			);

			$jobApplication->load( [ 'doctor', 'jobAdd' ] );
			return $this->success( new JobApplicationResource( $jobApplication ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$jobApplication = JobApplication::findOrFail( $id );
			$jobApplication->Load( [ 'doctor', 'jobAdd' ] );
			return $this->success( new JobApplicationResource( $jobApplication ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}



	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, JobApplication $jobApplication ) {
		return $this->failure( 'You are not authorized to update job applications' );
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( JobApplication $jobApplication ) {
		return $this->failure( 'You are not authorized to delete job applications' );

	}
	protected function handleStoreAuthroizationCheck() {
		if ( auth()->user()->type !== 'doctor' )
			throw new NotAuthorizedException( [ "This user is not signed as a health care professional" ] );
		if ( ! auth()->user()->doctor )
			throw new NotAuthorizedException( [ "This health care professionl didn't complete his basic information" ] );
	}
	protected function checkUserApplied( int $jobAddId ) {
		$jobAdd = auth()->user()->doctor->jobAdds()->where( 'job_adds.id', $jobAddId )->first();
		// $this->pr( $jobAdd );
		// $isApplied = $jobAdds->filter( fn( JobAdd $jobAdd, int $index ) => $jobAdd->id === $jobAddId )->isNotEmpty();
		if ( $jobAdd )
			throw new NotAuthorizedException( [ "You applied to this job add before" ] );
	}
}
