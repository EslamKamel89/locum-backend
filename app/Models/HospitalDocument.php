<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HospitalDocument extends Model {
	/** @use HasFactory<\Database\Factories\HospitalDocumentFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function hospital(): BelongsTo {
		return $this->belongsTo( Hospital::class);
	}

}
