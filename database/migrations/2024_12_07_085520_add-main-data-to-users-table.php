<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::table( 'users', function (Blueprint $table) {
			$table->foreignId( 'state_id' )
				->nullable()
				->constrained( 'specialties' )
				->nullOnDelete();
			$table->foreignId( 'district_id' )
				->nullable()
				->constrained( 'districts' )
				->nullOnDelete();
			$table->enum( 'type', [ 'doctor', 'hospital' ] );
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::table( 'users', function (Blueprint $table) {
			//
		} );
	}
};
