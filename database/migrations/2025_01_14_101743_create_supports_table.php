<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'supports', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'admin_id' )->nullable()->constrained()->nullOnDelete();
			$table->foreignId( 'user_id' )->constrained()->cascadeOnDelete();
			$table->enum( 'sender', [ 'user', 'admin' ] );
			$table->string( 'content' );
			$table->boolean( 'not_seen' )->default( true );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'supports' );
	}
};
