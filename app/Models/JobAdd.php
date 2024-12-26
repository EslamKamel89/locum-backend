<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobAdd extends Model {
	/** @use HasFactory<\Database\Factories\JobFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function hospital(): BelongsTo {
		return $this->belongsTo( Hospital::class);
	}
	public function specialty(): BelongsTo {
		return $this->belongsTo( Specialty::class, 'speciality_id', );
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
	public function jobSkills(): HasMany {
		return $this->hasMany( JobSkill::class, 'job_add_id', 'id' );
	}
	public function langs(): BelongsToMany {
		return $this->belongsToMany(
			related: Lang::class,
			table: 'job_lang',
			foreignPivotKey: 'job_add_id',
			relatedPivotKey: 'lang_id',
		);
	}
	public function jobLangs(): HasMany {
		return $this->hasMany( JobLang::class, 'job_add_id', 'id' );
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
	//! scopes
	public function scopeMain( Builder $query ) {
		return $query->select( [ 'title', 'job_type', "description", 'location', "created_at" ] );
	}

	public function scopeFilter( Builder $query ) {
		$filters = request()->only( [ 'specialty', 'job_info', 'job_type', 'state', 'langs', 'skills', 'location' ] );
		if ( isset( $filters['specialty'] ) )
			$filters['specialty'] = Specialty::getId( $filters['specialty'] );
		if ( isset( $filters['job_info'] ) )
			$filters['job_info'] = JobInfo::getId( $filters['job_info'] );
		$query
			->when(
				$filters['specialty'] ?? null,
				fn( $q, $v ) => $q->where( 'speciality_id', $v )
			)->when(
				$filters['job_info'] ?? null,
				fn( $q, $v ) => $q->where( 'job_info_id', $v )
			)->when(
				$filters['job_type'] ?? null,
				fn( $q, $v ) => $q->whereRaw( 'LOWER(job_type) = ?', [ strtoLower( trim( $v ) ) ] )
			)->when(
				$filters['location'] ?? null,
				fn( $q, $v ) => $q->whereRaw( 'LOWER(location) LIKE ?', [ strtoLower( trim( '%' . $v . '%' ) ) ] )
			)
		;
		if ( isset( $filters['langs'] ) && $filters['langs'] != '' )
			$query
				// ->with( 'jobLangs' )
				->whereHas( 'jobLangs', function (Builder $q) {
					$q->whereIn( 'lang_id', Lang::getIdsFromRequest() );
				} );
		if ( isset( $filters['skills'] ) && $filters['skills'] != '' )
			$query
				// ->with( 'jobSkills' )
				->whereHas( 'jobSkills', function (Builder $q) {
					$q->whereIn( 'skill_id', Skill::getIdsFromRequest() );
				} );
		if ( isset( $filters['state'] ) && $filters['state'] != '' )
			$query
				->whereHas( 'hospital.user.state', function (Builder $q) use ($filters) {
					$q->whereRaw( 'LOWER(states.name) = ?', [ strtolower( trim( $filters['state'] ) ) ] );
				} );

		return $query;
	}
	public function scopeSort( Builder $query ) {

		$sorts = request()->only( [ 'created_at', 'salary_max' ] );
		if ( count( $sorts ) == 0 ) {
			return $query->orderBy( 'created_at', 'desc' );
		}
		return $query
			->when(
				$sorts['created_at'] ?? null,
				fn( $q, $v ) => $q->orderBy( 'created_at', 'desc' )
			)->when(
				$sorts['salary_max'] ?? null,
				fn( $q, $v ) => $q->orderBy( 'salary_max', 'desc' )
			)
		;
	}
	public function scopeGetAddNotApplied( Builder $query ) {
		return $query->whereDoesntHave(
			'doctors',
			fn( Builder $q ) => $q->where( 'doctors.id', '=', auth()->user()->doctor->id )
		);
	}
}
