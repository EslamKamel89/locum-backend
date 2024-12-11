<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HospitalResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray( Request $request ): array {
		return collect( parent::toArray( $request ) )->merge( [ 
			'user' => new UserResource( $this->whenLoaded( 'user' ) ),
			'hospitalInfo' => new HospitalInfoResource( $this->whenLoaded( 'hospitalInfo' ) ),
			'hospitalDocuments' => HospitalDocumentResource::collection( $this->whenLoaded( 'hospitalDocuments' ) ),
			'jobAdds' => jobAddResource::collection( $this->whenLoaded( 'jobAdds' ) ),
		] )->toArray();
	}
}
