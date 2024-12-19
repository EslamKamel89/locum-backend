<?php

namespace App\Models\web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProvider extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'specialty_id',
        'years_of_experience',
        'phone_number',
        'email',
        'shift_preference',
        'shifts_per_month'
    ];
}
