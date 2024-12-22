<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
	//! Mutators
	protected function name(): Attribute {
		return Attribute::make(
			get: fn( string $value ) => trim( strtolower( $value ) ),
			set: fn( string $value ) => trim( strtolower( $value ) ),
		);
	}
	//! helpers
	public static function getIdsFromRequest(): ?array {
		$skillNames = [];
		$skills = request()->has( 'skills' ) ? request()->only( 'skills' )['skills'] : null;
		if ( ! $skills || str( $skills )->trim()->isEmpty() ) {
			return null;
		}
		$skillNames = explode( ',', $skills );
		$skillIds = collect( [] );
		foreach ( $skillNames as $skillName ) {
			$skillName = str( $skillName )->trim()->lower();
			$skill = Skill::where( 'name', $skillName )->first();
			// \App\Pr::_( $skillName );
			// \App\Pr::_( $skill );
			if ( $skill ) {
				$skillIds->add( $skill->id );
			}
		}
		// \App\Pr::_( $skillIds );
		return $skillIds->toArray();
	}
}
