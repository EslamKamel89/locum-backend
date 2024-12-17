<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class University extends Model {
	/** @use HasFactory<\Database\Factories\UniversityFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function doctorInfos(): HasMany {
		return $this->hasMany( DoctorInfo::class);
	}
	//! Mutators
	protected function name(): Attribute {
		return Attribute::make(
			get: fn( string $value ) => trim( strtolower( $value ) ),
			set: fn( string $value ) => trim( strtolower( $value ) ),
		);
	}
}
