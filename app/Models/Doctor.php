<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Doctor extends Model {
	/** @use HasFactory<\Database\Factories\DoctorFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function specialty(): BelongsTo {
		return $this->belongsTo( Specialty::class);
	}

	public function user(): BelongsTo {
		return $this->belongsTo( User::class);
	}

	public function jobInfo(): BelongsTo {
		return $this->belongsTo( JobInfo::class);
	}

	public function doctorInfo(): HasOne {
		return $this->hasOne( DoctorInfo::class);
	}

	public function doctorDocuments(): HasMany {
		return $this->hasMany( DoctorDocument::class);
	}
	public function skills(): BelongsToMany {
		return $this->belongsToMany(
			related: Skill::class,
			table: 'doctor_skill',
			foreignPivotKey: 'doctor_id',
			relatedPivotKey: 'skill_id',
		);
	}
	public function langs(): BelongsToMany {
		return $this->belongsToMany(
			related: Lang::class,
			table: 'doctor_lang',
			foreignPivotKey: 'doctor_id',
			relatedPivotKey: 'lang_id',
		);
	}

	public function jobAdds(): BelongsToMany {
		return $this->belongsToMany(
			related: JobAdd::class,
			table: 'job_application',
			foreignPivotKey: 'doctor_id',
			relatedPivotKey: 'job_add_id',
		)->withPivot( [ 'status', 'application_date', 'additional_notes',] )->withTimestamps();
	}

	public function comments(): MorphMany {
		return $this->morphMany( Comment::class, 'commentable' );
	}

	//! casts
	protected function casts() {
		return [ 
			'date_of_birth' => 'datetime:Y-m-d',
			'gender' => Gender::class,
			'willing_to_relocate' => 'boolean'
		];
	}

}
