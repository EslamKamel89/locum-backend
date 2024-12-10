<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'doctors', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'user_id' )->unique()->constrained()->cascadeOnDelete();
			$table->foreignId( 'specialty_id' )->nullable()->constrained()->nullOnDelete();
			$table->foreignId( 'job_info_id' )->nullable()->constrained()->nullOnDelete();
			$table->string( 'name' );
			$table->dateTime( 'date_of_birth' );
			$table->enum( 'gender', [ 'male', 'female' ] );
			$table->string( 'address' );
			$table->string( 'phone' );
			$table->boolean( 'willing_to_relocate' );
			$table->string( 'photo' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'doctors' );
	}
};
