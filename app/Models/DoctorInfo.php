<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorInfo extends Model {
	/** @use HasFactory<\Database\Factories\DoctorInfoFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function doctor(): BelongsTo {
		return $this->belongsTo( Doctor::class);
	}
	public function universities(): BelongsTo {
		return $this->belongsTo( University::class);
	}

}
