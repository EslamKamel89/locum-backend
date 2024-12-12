<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JobAdd extends Model {
	/** @use HasFactory<\Database\Factories\JobFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function hospital(): BelongsTo {
		return $this->belongsTo( Hospital::class);
	}
	public function specialty(): BelongsTo {
		return $this->belongsTo( Specialty::class);
	}
	public function jobInfo(): BelongsTo {
		return $this->belongsTo( JobInfo::class);
	}
	public function skills(): BelongsToMany {
		return $this->belongsToMany(
			related: Skill::class,
			table: 'job_skill',
			foreignPivotKey: 'job_add_id',
			relatedPivotKey: 'skill_id',
		);
	}
	public function langs(): BelongsToMany {
		return $this->belongsToMany(
			related: Lang::class,
			table: 'job_lang',
			foreignPivotKey: 'job_add_id',
			relatedPivotKey: 'lang_id',
		);
	}
	public function doctors(): BelongsToMany {
		return $this->belongsToMany(
			related: Doctor::class,
			table: 'job_application',
			foreignPivotKey: 'job_add_id',
			relatedPivotKey: 'doctor_id',
		)->withPivot( [ 'status', 'application_date', 'additional_notes',] )->withTimestamps();
	}
	//! casts
	protected function casts() {
		return [ 
			'application_deadline' => 'datetime:Y-m-d',
		];
	}
}
