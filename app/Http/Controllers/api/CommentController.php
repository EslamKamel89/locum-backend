<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$comments = request()->has( 'limit' ) ?
			Comment::getTopLevelComments()->paginate( request()->get( 'limit' ) ?? 10 ) :
			Comment::getTopLevelComments()->get();
		return $this->success(
			CommentResource::collection( $comments ),
			pagination: request()->has( 'limit' ),
		);
	}



	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {
		try {
			$rules = collect( [ 
				'user_id' => [ 'required', 'exists:users,id' ],
				'content' => [ 'required', 'max:255' ],
				'commentable_id' => [ 'required', 'integer' ],
				'commentable_type' => [ 'required',],
			] );
			if ( $request->has( 'parent_id' ) ) {
				$this->pr( 'I am here' );
				$rules = $rules->merge( [ 
					'parent_id' => [ 'required', 'exists:comments,id' ],
				] );
			} else {
				$rules = $rules->merge( [ 
					'rating' => [ 'required', 'integer', 'min:1', 'max:5' ],

				] );
			}
			$this->pr( $rules, '$rules' );
			$validator = Validator::make(
				$request->all(),
				$rules->toArray(),
			);
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$validated = $validator->validated();
			$validated['commentable_type'] = Comment::getModelNamespace( $validated['commentable_type'] );
			$comment = Comment::create( $validated );
			return $this->success( new CommentResource( $comment ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		//
	}



	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		//
	}
}
