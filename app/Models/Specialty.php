<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialty extends Model {
	/** @use HasFactory<\Database\Factories\SpecialtyFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function doctors(): HasMany {
		return $this->hasMany( Doctor::class);
	}
	public function jobAdds(): HasMany {
		return $this->hasMany( JobAdd::class);
	}
	//! scopes
	public function scopeGetId( Builder $query, string $name ): ?int {
		$name = strtolower( trim( $name ) );
		return $query->where( 'name', 'LIKE', "%" . $name . "%" )->first()?->id;
	}
}
