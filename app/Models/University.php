<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model {
	/** @use HasFactory<\Database\Factories\UniversityFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function doctorInfos(): HasMany {
		return $this->hasMany( DoctorInfo::class);
	}

}
