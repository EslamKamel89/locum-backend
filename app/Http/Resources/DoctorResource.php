<?php

namespace App\Http\Resources;

use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray( Request $request ): array {
		return collect( parent::toArray( $request ) )->merge( [ 
			'specialty' => new SpecialtyResource( $this->whenLoaded( 'posts' ) ),
			'user' => new UserResource( $this->whenLoaded( 'user' ) ),
			'jobInfo' => new JobInfoResource( $this->whenLoaded( 'jobInfo' ) ),
			'doctorInfo' => new DoctorInfoResource( $this->whenLoaded( 'doctorInfo' ) ),
			'doctorDocuments' => DoctorDocumentResource::collection( $this->whenLoaded( 'doctorDocuments' ) ),
		] )->toArray();
	}
}
