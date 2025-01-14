<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller {
	public function __construct(
		protected SupportService $service,
	) {
	}

	public function sendMessage( Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'content' => [ 'required', 'max:255' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}

			$content = $validator->validated()['content'];
			$data = $this->service->sendMessage( auth()->id(), 'user', $content );
			return $this->success( $data );
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

	public function getSupport( Request $request ) {
		try {

			$data = $this->service->getChat( auth()->id() );
			$this->service->markChatAsRead( auth()->id() );
			return $this->success( $data );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
