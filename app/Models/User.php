<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\AuthType;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
	/** @use HasFactory<\Database\Factories\UserFactory> */
	use HasFactory, Notifiable, HasApiTokens;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [ 
		'name',
		'email',
		'password',
		'state_id',
		'district_id',
		'type',
		'auth_type',
		'auth_id',
		'fcm_token',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [ 
		'password',
		'remember_token',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array {
		return [ 
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
			'auth_type' => AuthType::class,
		];
	}
	//! Relationships
	public function state(): BelongsTo {
		return $this->belongsTo( State::class);
	}

	public function district(): BelongsTo {
		return $this->belongsTo( District::class);
	}

	public function doctor(): HasOne {
		return $this->hasOne( Doctor::class);
	}
	public function hospital(): HasOne {
		return $this->hasOne( Hospital::class);
	}
	public function comments(): HasMany {
		return $this->hasMany( Comment::class);
	}
	public function sendedMessages(): HasMany {
		return $this->hasMany( Message::class, 'sender_id' );
	}
	public function recievedMessages(): HasMany {
		return $this->hasMany( Message::class, 'receiver_id' );
	}
}
