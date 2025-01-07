<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'hospital_infos', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'hospital_id' )->unique()->constrained()->cascadeOnDelete();
			$table->string( 'license_number' )->nullable();
			$table->string( 'license_state' )->nullable();
			$table->date( 'license_issue_date' )->nullable();
			$table->date( 'license_expiry_date' )->nullable();
			$table->string( 'operating_hours' )->nullable();
			//! new column added to the database
			$table->string( 'staffing_levels' )->nullable();
			$table->json( 'services_offered' )->nullable();
			$table->json( 'notifcation_preferences' )->nullable();
			$table->string( 'feedback_method' )->nullable();
			$table->string( 'general_policy' )->nullable();
			$table->string( 'emergency_policy' )->nullable();
			$table->string( 'affiliations' )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'hospital_infos' );
	}
};

