<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'job_application', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'job_add_id' )->constrained( 'job_adds' )->cascadeOnDelete();
			$table->foreignId( 'doctor_id' )->constrained()->cascadeOnDelete();
			$table->enum( 'status', [ "Pending", "Accepted", "Rejected" ] )->default( 'Pending' );
			$table->dateTime( 'application_date' )->default( now() );
			$table->text( 'additional_notes' )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'job_applications' );
	}
};
