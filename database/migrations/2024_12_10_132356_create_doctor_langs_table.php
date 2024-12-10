<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'doctor_lang', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'lang_id' )->constrained()->cascadeOnDelete();
			$table->foreignId( 'doctor_id' )->constrained()->cascadeOnDelete();

			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'doctor_langs' );
	}
};
