<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model {
	/** @use HasFactory<\Database\Factories\DistrictFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function state(): BelongsTo {
		return $this->belongsTo( State::class);
	}

	public function users(): HasMany {
		return $this->hasMany( User::class);
	}

}
