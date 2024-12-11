<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hospital extends Model {
	/** @use HasFactory<\Database\Factories\HospitalFactory> */
	use HasFactory;
	protected $guarded = [];

	//! Relationships
	public function user(): BelongsTo {
		return $this->belongsTo( User::class);
	}
	public function hospitalInfo(): HasOne {
		return $this->hasOne( HospitalInfo::class);
	}
	public function hospitalDocuments(): HasMany {
		return $this->hasMany( HospitalDocument::class);
	}
	public function jobAdds(): HasMany {
		return $this->hasMany( JobAdd::class);
	}


}
