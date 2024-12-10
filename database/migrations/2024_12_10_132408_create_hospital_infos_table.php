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

