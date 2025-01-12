<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller {

	public function __construct(
		protected MessageService $service,
	) {
	}
	public function sendMessage( Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'other_user_id' => [ 'required', 'exists:users,id' ],
					'content' => [ 'required', 'max:255' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$otherUserId = $validator->validated()['other_user_id'];
			$content = $validator->validated()['content'];
			$data = $this->service->sendMessage( auth()->id(), $otherUserId, $content );
			return $this->success( $data );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
	public function getAllChatsForUser() {
		try {
			return $this->success(
				$this->service->getAllChatsForUser( auth()->id() )
			);
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
	public function getUnSeenCount() {
		try {
			return $this->success(
				$this->service->getUnSeenCount( auth()->id() )
			);
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	public function getChat( Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'other_user_id' => [ 'required', 'exists:users,id' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$data = $this->service->getChat( auth()->id(), $validator->validated()['other_user_id'] );
			$this->service->markChatAsRead( auth()->id(), $validator->validated()['other_user_id'] );
			return $this->success( $data );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
