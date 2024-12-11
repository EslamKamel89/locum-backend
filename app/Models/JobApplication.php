<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model {
	/** @use HasFactory<\Database\Factories\JobApplicationFactory> */
	use HasFactory;
	protected $guarded = [];
	protected $table = 'job_application';

	//! Relationships
	public function doctor(): BelongsTo {
		return $this->belongsTo( Doctor::class);
	}
	public function jobAdd(): BelongsTo {
		return $this->belongsTo( JobAdd::class);
	}

}
