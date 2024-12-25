<?php
namespace App\Enums;
enum shiftPreference: string {
	case day = 'day';
	case night = 'night';
	case weekday = 'weekday';
	case weekend = 'weekend';
	case noPreference = 'noPreference';
}
