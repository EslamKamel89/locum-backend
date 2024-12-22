<?php

namespace App\Models\web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'street',
        'city_id',
        'state_id',
        'fname',
        'lname',
        'phone',
        'email',
        'phone_number',
        'coverage_need',
    ];
}
