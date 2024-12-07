<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model {
	/** @use HasFactory<\Database\Factories\DistrictFactory> */
	use HasFactory;
	protected $fillable = [ 'name', 'state_id' ];
	public function state(): BelongsTo {
		return $this->belongsTo( State::class);
	}
}
