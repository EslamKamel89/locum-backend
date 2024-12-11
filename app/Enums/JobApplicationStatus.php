<?php
namespace App\Enums;
enum JobApplicationStatus: string {
	case Pending = 'pending';
	case Accepted = 'accepted';
	case Rejected = 'rejected';
}
