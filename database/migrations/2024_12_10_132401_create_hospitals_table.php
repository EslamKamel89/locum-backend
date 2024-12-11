<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'hospitals', function (Blueprint $table) {
			$table->id();

			$table->foreignId( 'user_id' )->unique()->constrained()->cascadeOnDelete();
			$table->string( 'facility_name' );
			$table->string( 'type' ); // ['Hospital', 'Clinic', 'Nursing Home', 'Other']
			$table->string( 'contact_person' )->nullable();
			$table->string( 'contact_email' )->nullable();
			$table->string( 'contact_phone' )->nullable();
			$table->string( 'address' )->nullable();
			$table->text( 'services_offered' )->nullable();
			$table->integer( 'number_of_beds' )->nullable();
			$table->string( 'website_url' )->nullable();
			$table->integer( 'year_established' )->nullable();
			$table->text( 'overview' )->nullable();
			$table->string( 'photo' )->nullable();

			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'hospitals' );
	}
};


