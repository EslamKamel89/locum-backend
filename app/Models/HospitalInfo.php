<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HospitalInfo extends Model {
	/** @use HasFactory<\Database\Factories\HospitalInfoFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function hospital(): BelongsTo {
		return $this->belongsTo( Hospital::class);
	}
	//! casts
	protected function casts() {
		return [ 
			'license_issue_date' => 'datetime:Y-m-d',
			'license_expiry_date' => 'datetime:Y-m-d',
			'services_offered' => 'array',
			'notifcation_preferences' => 'array',
		];
	}
}
