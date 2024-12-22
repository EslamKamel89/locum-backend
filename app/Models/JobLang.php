<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLang extends Model {
	/** @use HasFactory<\Database\Factories\JobLangFactory> */
	use HasFactory;
	protected $guarded = [];
	public $table = 'job_lang';

	//! Relationships
}
