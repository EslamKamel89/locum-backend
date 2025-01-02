<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Contracts\Database\Eloquent\Builder;


class Comment extends Model {
	/** @use HasFactory<\Database\Factories\CommentFactory> */
	use HasFactory;
	protected $fillable = [ 
		'user_id',
		'content',
		'rating',
		'commentable_id',
		'commentable_type',
		'parent_id'
	];

	//! relations
	public function commentable(): MorphTo {
		return $this->morphTo();
	}

	public function parent(): BelongsTo {
		return $this->belongsTo( self::class, 'parent_id' );
	}

	public function children(): HasMany {
		return $this->hasMany( self::class, 'parent_id' );
	}

	public function user(): BelongsTo {
		return $this->belongsTo( User::class);
	}

	//! global scopes
	protected static function booted(): void {
		static::addGlobalScope( 'children', function (Builder $builder) {
			$builder->with( [ 'children', 'user' ] );
		} );
	}

	//! scopes
	public function scopeGetTopLevelComments( Builder $query ) {
		$commentableType = null;
		if ( request()->has( 'commentableType' ) ) {
			$commentableReq = request()->commentableType;
			$commentableType = self::getModelNamespace( $commentableReq );
		}
		return Comment::whereNull( 'parent_id' )
			->when( $commentableType,
				function (Builder $q, string $commentableType) {
					return $q->where( 'commentable_type', $commentableType );
				}
			)->when( request()->commentableId ?? null,
				function (Builder $q, $commentableId) {
					return $q->where( 'commentable_id', $commentableId );
				}
			);
	}

	//! helpers
	public static function getModelNamespace( string $commentableReq ): string {
		if ( $commentableReq == 'doctor' ) {
			return Doctor::class;
		} else if ( $commentableReq == 'hospital' ) {
			return Hospital::class;
		} else {
			return JobAdd::class;
		}
	}
}
