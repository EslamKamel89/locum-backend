<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'job_adds', function (Blueprint $table) {
			$table->id();
			$table->string( 'title' );
			$table->foreignId( 'hospital_id' )->constrained()->cascadeOnDelete();
			$table->foreignId( 'speciality_id' )->nullable()->constrained( 'specialties' )->nullOnDelete();
			$table->foreignId( 'job_info_id' )->nullable()->constrained()->nullOnDelete();
			$table->string( 'job_type' )->nullable(); // ['Fulltime', 'Parttime', 'Contract', 'Locum']
			$table->string( 'location' )->nullable();
			$table->text( 'description' )->nullable();
			$table->text( 'responsibilities' )->nullable();
			$table->text( 'qualifications' )->nullable();
			$table->text( 'experience_required' )->nullable();
			$table->decimal( 'salary_min' )->nullable();
			$table->decimal( 'salary_max' )->nullable();
			$table->text( 'benefits' )->nullable();
			$table->string( 'working_hours' )->nullable();
			$table->dateTime( 'application_deadline' )->nullable();
			$table->text( 'required_documents' )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'jobs' );
	}
};

