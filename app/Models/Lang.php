<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lang extends Model {
	/** @use HasFactory<\Database\Factories\LangFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships

	public function doctors(): BelongsToMany {
		return $this->belongsToMany(
			related: Doctor::class,
			table: 'doctor_lang',
			foreignPivotKey: 'lang_id',
			relatedPivotKey: 'doctor_id',
		);
	}
	public function jobAdds(): BelongsToMany {
		return $this->belongsToMany(
			related: JobAdd::class,
			table: 'job_lang',
			foreignPivotKey: 'lang_id',
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
}
