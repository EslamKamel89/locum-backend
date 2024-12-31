<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model {
	/** @use HasFactory<\Database\Factories\ReviewFactory> */
	use HasFactory;
	protected $fillable = [ 
		'user_id',
		'reviewable_id',
		'reviewable_type',
		'content',
		'rating',
	];
	//! Relations
	public function reviewable(): MorphTo {
		return $this->morphTo();
	}
	public function user(): BelongsTo {
		return $this->belongsTo( User::class);
	}
}
