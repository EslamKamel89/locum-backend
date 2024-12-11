<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model {
	/** @use HasFactory<\Database\Factories\SkillFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships

	public function doctors(): BelongsToMany {
		return $this->belongsToMany(
			related: Doctor::class,
			table: 'doctor_skill',
			foreignPivotKey: 'skill_id',
			relatedPivotKey: 'doctor_id',
		);
	}
	public function jobAdds(): BelongsToMany {
		return $this->belongsToMany(
			related: JobAdd::class,
			table: 'job_skill',
			foreignPivotKey: 'skill_id',
			relatedPivotKey: 'job_add_id',
		);
	}

}
