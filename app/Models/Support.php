<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Support extends Model {
	/** @use HasFactory<\Database\Factories\SupportFactory> */
	use HasFactory;
	protected $fillable = [ 
		'admin_id',
		'user_id',
		'content',
		'sender',
		'not_seen',
	];
	//! casts
	protected function casts(): array {
		return [ 
			'not_seen' => 'boolean',
		];
	}
	//! relationships
	public function user(): BelongsTo {
		return $this->belongsTo( User::class);
	}
	public function admin(): BelongsTo {
		return $this->belongsTo( Admin::class);
	}
	//! Mutators
	protected function createdAt(): Attribute {
		return Attribute::make(
			get: fn( string $value ) => Carbon::parse( $value )->diffForHumans(),
			set: fn( string $value ) => $value,
		);
	}
}
