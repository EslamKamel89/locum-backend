<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'doctor_infos', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'doctor_id' )->unique()->constrained()->cascadeOnDelete();
			$table->string( 'professional_license_number' )->nullable();
			$table->string( 'license_state' )->nullable();
			$table->dateTime( 'license_issue_date' )->nullable();
			$table->datetime( 'license_expiry_date' )->nullable();
			$table->foreignId( 'university_id' )->nullable()->constrained()->nullOnDelete();
			$table->string( 'highest_degree' )->nullable();
			$table->string( 'field_of_study' )->nullable();
			$table->integer( 'graduation_year' )->nullable();
			$table->text( 'work_experience' )->nullable();
			$table->string( 'cv' )->nullable();
			$table->text( 'biography' )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'doctor_infos' );
	}
};
