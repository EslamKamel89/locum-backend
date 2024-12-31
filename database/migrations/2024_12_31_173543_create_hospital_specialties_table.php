<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'hospital_specialties', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'specialty_id' )->constrained( 'specialties' )->cascadeOnDelete();
			$table->foreignId( 'hospital_id' )->constrained( 'hospitals' )->cascadeOnDelete();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'hospital_specialties' );
	}
};
