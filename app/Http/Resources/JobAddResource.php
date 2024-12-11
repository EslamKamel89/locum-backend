<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobAddResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray( Request $request ): array {
		return collect( parent::toArray( $request ) )->merge( [ 
			'hospital' => new HospitalResource( $this->whenLoaded( 'hospital' ) ),
			'specialty' => new SpecialtyResource( $this->whenLoaded( 'specialty' ) ),
			'jobInfo' => new JobInfoResource( $this->whenLoaded( 'jobInfo' ) ),
		] )->toArray();
	}
}
