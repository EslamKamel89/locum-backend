<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Message extends Model {
	/** @use HasFactory<\Database\Factories\MessageFactory> */
	use HasFactory;
	protected $fillable = [ 
		'sender_id',
		'receiver_id',
		'content',
		'not_seen',
	];

	//! casts
	protected function casts(): array {
		return [ 
			'not_seen' => 'boolean',

		];
	}

	//! Relations
	public function sender(): BelongsTo {
		return $this->belongsTo( related: User::class, foreignKey: 'sender_id' );
	}

	public function receiver(): BelongsTo {
		return $this->belongsTo( related: User::class, foreignKey: 'receiver_id' );
	}

	//! Mutators
	protected function createdAt(): Attribute {
		return Attribute::make(
			get: fn( string $value ) => Carbon::parse( $value )->diffForHumans(),
			set: fn( string $value ) => $value,
		);
	}
}
