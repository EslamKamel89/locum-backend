<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorInfoResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray( Request $request ): array {
		return collect( parent::toArray( $request ) )->merge( [ 
			'doctor' => new DoctorResource( $this->whenLoaded( 'doctor' ) ),
			'university' => new UserResource( $this->whenLoaded( 'university' ) ),
			'skills' => new SkillResource( $this->whenLoaded( 'skills' ) ),
		] )->toArray();
	}
}
