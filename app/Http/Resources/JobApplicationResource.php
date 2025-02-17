<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray( Request $request ): array {
		return collect( parent::toArray( $request ) )->merge( [
			'doctor' => new DoctorResource( $this->whenLoaded( 'doctor' ) ),
			'jobAdd' => new JobAddResource( $this->whenLoaded( 'jobAdd' ) ),
		] )->toArray();
	}
}
