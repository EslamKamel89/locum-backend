<?php
namespace App\Enums;
enum JobApplicationStatus: string {
	case pending = 'pending';
	case accepted = 'accepted';
	case rejected = 'rejected';
}
